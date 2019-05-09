@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-center mt-3">
    <div><h2 class="display-4">Update Profile</h2></div>
</div>
@if (session('update_success'))
<div class="d-flex justify-content-center mt-5">
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ session('update_success') }}</strong>
    </div>
</div>
@endif
@if (session('update_failed'))
<div class="d-flex justify-content-center mt-5">
    <div class="alert alert-error alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ session('update_failed') }}</strong>
    </div>
</div>
@endif
<div class="d-flex justify-content-center px-2 mt-5">
    <form action="submit" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="form-group">
            <label for="firstname">First Name</label>
            <input type="text"
                   class="form-control"
                   id="firstname"
                   value="{{ $user->first_name }}"
                   name="firstname"
                   placeholder="Please enter first name" maxlength="50">
            @error('firstname')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="lastname">Last Name</label>
            <input type="text"
                   class="form-control"
                   id="lastname"
                   value="{{ $user->last_name }}"
                   name="lastname"
                   placeholder="Please enter last name"
                   maxlength="50">
            @error('lastname')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="text"
                   class="form-control"
                   id="email"
                   value="{{ $user->email }}"
                   name="email"
                   placeholder="Please enter email address">
            @error('email')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text"
                   class="form-control"
                   id="username"
                   value="{{ $user->username }}"
                   name="username"
                   placeholder="Please enter username"
                   maxlength="20">
            @error('username')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">New Password</label>
            <input type="password"
                   class="form-control"
                   id="password"
                   name="password"
                   placeholder="Please enter password"
                   maxlength="20">
            <small class="form-text text-muted">
                If you leave it blank, you can still use your old password when you login.
            </small>
            @error('password')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="fileToUpload">Display Picture</label>
            <input type="file"
                   class="form-control-file"
                   id="fileToUpload"
                   name="fileToUpload">
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
            <textarea class="form-control"
                      id="description"
                      name="description"
                      maxlength="160">{{ $user->description }}</textarea>
            <small class="form-text text-muted">Write a short description about yourself</small>
            @error('description')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="url">Blog URL</label>
            <small class="form-text text-muted">{{ url()->previous() }}/</small>
            <input type="text"
                   class="form-control"
                   id="url"
                   value="{{ $user->url }}"
                   name="url"
                   placeholder="Please enter blog url"
                   maxlength="20">
            @error('url')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>
</div>

@endsection
