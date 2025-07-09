@extends('admin.main')

@section('content')
<div class="body-content">
    <div class="decoration blur-2"></div>
   <div class="decoration blur-3"></div>
   <div class="container-xxl">
      <div id="success-message" class="alert alert-success d-none"></div>
      <div class="card">
         <div class="card-header position-relative">
            <h6 class="fs-17 fw-semi-bold my-1">Blog List</h6>
            <a onclick="openPopup()" class="ad_cntr_pop" >
               <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                  <path d="M12 5l0 14" />
                  <path d="M5 12l14 0" />
               </svg>
               Add Blog
            </a>
         </div>
         <div class="card-body">
            <div class="table-responsive">
                <table id="blogsTable" class="display table table-borderless text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>    
            </div>
         </div>
      </div>
   </div>
</div>

<div class="popup-overlay popmain" id="popup">
   <div class="popup-content" style="margin-top:10%">
      <button class="close-btn" onclick="closePopup()">×</button>
      <h2>Add Blog</h2>
      <form id="blogForm" enctype="multipart/form-data">
         @csrf
         <input type="hidden" name="blog_id">
         <div class="col-sm-12" bis_skin_checked="1">
             <div class="col-sm-12" bis_skin_checked="1">
               <label class="fw-medium mb-2">Title</label>
               <input type="text" name="title" class="form-control">
               <span class="text-danger" id="title-error"></span>
            </div>
             <div class="col-sm-12" bis_skin_checked="1">
               <label class="fw-medium mb-2">Content</label>
               <textarea name="content" class="form-control" rows="4"></textarea>
               <span class="text-danger" id="content-error"></span>
            </div>
             <div class="col-sm-12" bis_skin_checked="1">
               <label class="fw-medium mb-2">Image</label>
               <input type="file" name="image" class="form-control">
               <span class="text-danger" id="image-error"></span>
            </div>
             <div class="col-sm-12" bis_skin_checked="1">
               <label class="fw-medium mb-2">Status</label>
               <select name="status" class="form-control">
                  <option value="draft">Draft</option>
                  <option value="published">Published</option>
               </select>
               <span class="text-danger" id="status-error"></span>
            </div>
         </div>
         <button type="submit" class="ad_clas mt-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2">
               <path d="M12 5v14M5 12h14"/>
            </svg>
             <span id="blogSubmitText">Add Blog</span>
         </button>
      </form>
   </div>
</div>

<script>
    function openPopup() {
        document.getElementById("popup").style.display = "block";
        $('#blogSubmitText').text('Add Blog');
    //     $('[name="blog_id"]').val('');
    //     $('[name="title"]').val('');
    //     $('[name="content"]').val('');
    //     $('[name="status"]').val('');
     }
    function closePopup() {
        document.getElementById("popup").style.display = "none";
    }
</script>
@endsection

@section('scripts')
<script>
$(document).ready(function () {
    let table = $('#blogsTable').DataTable({
        ajax: {
            url: '{{ route("admin.blogs.list") }}',
            dataSrc: 'data'
        },
        columns: [
            { data: 'id' },
            { data: 'title' },
            { data: 'status' },
            {
                data: null,
                render: function (data, type, row) {
                    return `
                        <button onclick="editBlog(${row.id})">Edit</button>
                        <button onclick="deleteBlog(${row.id})">Delete</button>
                    `;
                }
            }
        ]
    });

    $('#blogForm').on('submit', function (e) {
        e.preventDefault();
        let formData = new FormData(this);
        let blogId = $('[name="blog_id"]').val();
        let url = blogId ? `/admin/blogs/${blogId}` : '{{ route("admin.blogs.store") }}';

        if (blogId) {
            formData.append('_method', 'PUT');
        }

        $.ajax({
            url: url,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                $('#success-message').removeClass('d-none').text(response.message);
                $('#popup').hide();
                $('#blogForm')[0].reset();
                table.ajax.reload();
                setTimeout(() => $('#success-message').addClass('d-none').text(''), 3000);
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;
                    $.each(errors, function(field, messages) {
                        $(`[name="${field}"]`).addClass('is-invalid');
                        $(`#${field}-error`).text(messages[0]);
                    });
                }
            }
        });
    });
});

window.editBlog = function(id) {
    $.get(`/admin/blogs/${id}/edit`, function(blog) {
        openPopup();
        $('#blogForm')[0].reset();
        $('[name="blog_id"]').val(blog.id);
        $('[name="title"]').val(blog.title);
        $('[name="content"]').val(blog.content);
        $('[name="status"]').val(blog.status);
        $('#blogSubmitText').text('Update Blog');
    });
};

window.deleteBlog = function(id) {
    if (confirm("Are you sure to delete this blog?")) {
        $.ajax({
            url: `/admin/blogs/${id}`,
            method: 'DELETE',
            data: { _token: '{{ csrf_token() }}' },
            success: function(response) {
                $('#success-message').removeClass('d-none').text(response.message);
                $('#blogsTable').DataTable().ajax.reload();
                setTimeout(() => $('#success-message').addClass('d-none').text(''), 3000);
            }
        });
    }
};
</script>
@endsection