@extends('admin.main')

@section('content')
<div class="container mt-4">
    <h2>Client List</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Company Name</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($clients as $client)
                <tr>
                    <td>{{ $client->id }}</td>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->company_name ?? 'N/A' }}</td>
                    <td>{{ $client->created_at->format('d M Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No clients found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
