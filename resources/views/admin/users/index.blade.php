@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 p-0">
            <h1>Users</h1>
        </div>
        <div class="col-md-4 offset-md-4 text-right p-0">
            <a href="/admin/users/create" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Add user"><i class="fas fa-plus"></i></a>
        </div>
    </div>

    <div class="row">
        <table class="table table-striped table-bordered" id="usersTable">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">User Type</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->usertype->type }}</td>
                    <td>
                        <a href="/admin/users/{{ $user->id }}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="View"><i
                                class="fas fa-search"></i></a>
                        <a href="/admin/users/{{ $user->id }}/edit" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit"><i
                                class="fas fa-edit"></i></a>
                        <span data-toggle="tooltip" data-placement="top" title="Delete">
                            <a href="#" class="btn btn-danger btn-sm open-delete-modal" data-toggle="modal" data-target="#delete-user-modal" data-id="{{ $user->id }}" data-action="users"><i class="fas fa-trash"></i></a>
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="row">
        <div class="col-12 d-flex justify-content-end">
            {{ $users->links() }}
        </div>
    </div>
</div>

@if (count($users) > 0)
<div class="modal fade" id="delete-user-modal" tabindex="-1" role="dialog" aria-labelledby="delete-user-label"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete-user-label">Delete User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this user?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary btn-delete" data-id="" data-action="">Confirm</button>
            </div>
        </div>
    </div>
</div>
@endif

@endsection