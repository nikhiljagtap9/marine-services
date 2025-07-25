@extends('admin.main')

@section('content')
<div class="container py-4">
    <h4 class="mb-4">Manage Terms & Conditions</h4>

    <form id="tcForm">
        @csrf
        <input type="hidden" name="id" id="tc_id">
        
        <div class="row g-3">
            <div class="col-md-4">
                <label class="form-label">Section Title</label>
                <input type="text" name="section_title" id="section_title" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Content (Each point in new line)</label>
                <textarea name="content" id="content" class="form-control" required rows="4"></textarea>
            </div>
            <div class="col-md-2">
                <label class="form-label">Status</label>
                <select name="status" id="status" class="form-select" required>
                    <option value="">Select</option>
                    <option value="published">Published</option>
                    <option value="draft">Draft</option>
                </select>
            </div>
        </div>
        <button class="btn btn-primary mt-3" id="formBtn">Add T&C Item</button>
        <button type="button" id="tcResetBtn" class="btn btn-secondary mt-3 ms-2">Reset</button>
    </form>

    <div id="messageContainer" class="mt-3 d-none">
        <div id="messageContent" class="alert"></div>
    </div>

    <hr class="my-4">

    <table id="termsTable" class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Sr.No</th>
                <th>Title</th>
                <th>Content</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($terms as $term)
                <tr id="row-{{ $term->id }}">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $term->section_title }}</td>
                    <td>
                        <ul class="mb-0">
                            @foreach(explode("\n", $term->content) as $point)
                                <li>{{ trim($point) }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>{{ $term->status }}</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-primary me-1 editTcBtn"
                            data-id="{{ $term->id }}"
                            data-title="{{ $term->section_title }}"
                            data-content="{{ $term->content }}"
                            data-status="{{ $term->status }}"
                        >Edit</button>
                        <button class="btn btn-sm btn-danger" onclick="deleteTC({{ $term->id }})">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function () {
    $('#tcForm').on('submit', function (e) {
        e.preventDefault();

        const form = $(this);
        const formData = new FormData(this);
        const isUpdate = $('#tc_id').val() !== '';

        $.ajax({
            url: "{{ route('admin.tc.store') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            headers: { 'X-CSRF-TOKEN': $('input[name="_token"]').val() },
            success: function (data) {
                if (data.status === 1) {
                    // Show success message
                     showMessage(data.message, 'success');

                    // Reset form
                    form[0].reset();
                    $('#tc_id').val('');
                    $('#formBtn').text('Add T&C Item');

                    let points = data.term.content.split("\n").map(p => `<li>${p.trim()}</li>`).join("");
                    let row = `
                        <tr id="row-${data.term.id}">
                            <td></td>
                            <td>${data.term.section_title}</td>
                            <td><ul class="mb-0">${points}</ul></td>
                            <td>${data.term.status}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary me-1 editTcBtn"
                                    data-id="${data.term.id}"
                                    data-title="${data.term.section_title}"
                                    data-content="${data.term.content}"
                                    data-status="${data.term.status}"
                                >Edit</button>
                                <button class="btn btn-sm btn-danger" onclick="deleteTC(${data.term.id})">Delete</button>
                            </td>
                        </tr>
                    `;

                    if (isUpdate) {
                        $(`#row-${data.term.id}`).replaceWith(row);
                    } else {
                        $('#termsTable tbody').append(row);
                    }

                    reorderSerials();
                }
            },
            error: function(xhr) {
                const errorMsg = xhr.responseJSON?.message || "Something went wrong. Please try again.";
                showMessage(errorMsg, 'danger');
            }
        });
    });

    $('#tcResetBtn').on('click', function () {
        $('#tcForm')[0].reset();
        $('#tc_id').val('');
        $('#formBtn').text('Add T&C Item');
    });

    $(document).on('click', '.editTcBtn', function () {
        $('#tc_id').val($(this).data('id'));
        $('#section_title').val($(this).data('title'));
        $('#content').val($(this).data('content'));
        $('#status').val($(this).data('status'));
        $('#formBtn').text('Update T&C Item');

        $('html, body').animate({
            scrollTop: $('#tcForm').offset().top - 100
        }, 400);
    });
});

// Delete function
function deleteTC(id) {
    if (confirm("Are you sure to delete this item?")) {
        $.ajax({
            url: `/admin/terms/${id}`,
            method: 'POST',
            data: {
                _method: 'DELETE',
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                $(`#row-${id}`).remove();
                reorderSerials();

                 // Show success message
                showMessage(response.message || "Deleted successfully", 'success');
            },
            error: function(xhr) {
                const errorMsg = xhr.responseJSON?.message || "Something went wrong. Please try again.";
                showMessage(errorMsg, 'danger');
            }
        });
    }
}

// Reorder serial numbers
function reorderSerials() {
    $('#termsTable tbody tr').each(function(index) {
        $(this).find('td:first').text(index + 1);
    });
}

// reusable function to handle message display and scroll
function showMessage(msg, type = 'success') {
    const container = $('#messageContainer');
    const content = $('#messageContent');

    content.removeClass().addClass(`alert alert-${type}`).text(msg);
    container.removeClass('d-none');

    // Scroll into view and focus
    $('html, body').animate({
        scrollTop: container.offset().top - 100
    }, 500);

    // Auto hide after 3s
    setTimeout(() => {
        container.addClass('d-none');
        content.removeClass().text('');
    }, 3000);
}

</script>
@endsection
