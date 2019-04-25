@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-center">
    <div><h2 class="display-4">Registration</h2></div>
</div>
<div class="d-flex justify-content-center">
    <div class="p-12"><h5>Register now and start blogging!</h5></div>
</div>
@if (session('create_success'))
<div class="d-flex justify-content-center">
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ session('create_success') }} You can now <a href="/">login</a>.</strong>
    </div>
</div>
@endif
<div class="d-flex justify-content-center">
    <form action="/register" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="form-group">
            <label for="firstname">First Name</label>
            <input type="text" class="form-control" id="firstname" name="firstname"
                   placeholder="Please enter first name" maxlength="50">
        </div>
        <div class="form-group">
            <label for="lastname">Last Name</label>
            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Please enter last name"
                   maxlength="50">
        </div>
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Please enter email address">
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Please enter username"
                   maxlength="20">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password"
                   placeholder="Please enter password" maxlength="20" minlength="8">
        </div>
        <div class="form-group">
            <label for="fileToUpload">Display Picture</label>
            <input type="file" class="form-control-file" id="fileToUpload" name="fileToUpload">
            <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of
                image should
                not be more than 10MB.
            </small>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" maxlength="160"></textarea>
            <small class="form-text text-muted">Write a short description about yourself</small>
        </div>
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

@endsection
