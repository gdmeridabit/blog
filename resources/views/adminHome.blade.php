@extends('layouts.app')

@section('content')

<div class="d-flex p-2 flex-row mt-5">
    <img src="{{ $dp }}" class="float-left profile" alt="" style="height:150px; max-width: 100%">
    <h1 class="mt-5 ml-3">{{ $user->first_name }} {{ $user->last_name }}</h1>
</div>
<div class="d-flex flex-row">
    @if (session('delete_success'))
    <div class="d-flex justify-content-center">
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ session('create_success') }} You can now <a href="/">login</a>.</strong>
        </div>
    </div>
    @endif
    @if (session('delete_failed'))
    <div class="d-flex justify-content-center">
        <div class="alert alert-error alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ session('create_failed') }}</strong>
        </div>
    </div>
    @endif
</div>
<div class="border border-primary mt-5">
    <div class="d-flex justify-content-center bg-primary">
        <h5 class="text-white my-2">Users List</h5>
    </div>
    <div class="d-flex ">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Username</th>
                <th scope="col">Date Joined</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $data)
            <tr>
                <td>{{ $data->first_name }}</td>
                <td>{{ $data->last_name }}</td>
                <td>{{ $data->username }}</td>
                <td>{{ $data->created_at }}</td>
                <td>
                    <a href="" class="btn btn-outline-primary">Update</a>
                    <button class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal">Delete</button>
                    @if ($data->is_enabled)
                    <a href="" class="btn btn-outline-success">Disable</a>
                    @else
                    <a href="" class="btn btn-outline-secondary">Enable</a>
                    @endif
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="d-flex justify-content-center">
    {{ $users->links() }}
</div>


<div class="border border-primary mt-5">
    <div class="d-flex justify-content-center bg-primary">
        <span class="text-white">Post List</span>
    </div>
    <div class="d-flex ">
        <h4 class="">Post List</h4>
    </div>
</div>

<!-- User Delete Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this user?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a id="delete-user-button" class="btn btn-primary">Delete</a>
            </div>
        </div>
    </div>
</div>

<script>
    
</script>

@endsection
