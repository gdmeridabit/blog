@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-center mt-3">
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
@if (session('create_failed'))
<div class="d-flex justify-content-center">
    <div class="alert alert-error alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ session('create_failed') }}</strong>
    </div>
</div>
@endif
<div class="d-flex justify-content-center px-2">
    <form action="/register" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="form-group">
            <label for="firstname">First Name</label>
            <input type="text" class="form-control" id="firstname" name="firstname"
                   placeholder="Please enter first name" maxlength="50">
            @error('firstname')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="lastname">Last Name</label>
            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Please enter last name"
                   maxlength="50">
            @error('lastname')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Please enter email address">
            @error('email')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Please enter username"
                   maxlength="20">
            @error('username')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password"
                   placeholder="Please enter password" maxlength="20">
            @error('password')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="fileToUpload">Display Picture</label>
            <input type="file" class="form-control-file" id="fileToUpload" name="fileToUpload">
            <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of
                image should
                not be more than 10MB.
            </small>
            @error('fileToUpload')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" maxlength="160"></textarea>
            <small class="form-text text-muted">Write a short description about yourself</small>
            @error('description')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>
</div>

@endsection
