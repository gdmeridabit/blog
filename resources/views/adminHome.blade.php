@extends('layouts.app')

@section('content')

<div class="d-flex p-2 flex-row mt-5">
    <img src="{{ $user->display_picture }}" class="float-left profile" alt="" style="height:150px; max-width: 100%">
    <h1 class="mt-5 ml-3">{{ $user->first_name }} {{ $user->last_name }}</h1>
</div>
@if (session('delete_success'))
<div class="d-flex justify-content-center">
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ session('delete_success') }}</strong>
    </div>
</div>
@endif
@if (session('delete_failed'))
<div class="d-flex justify-content-center">
    <div class="alert alert-error alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ session('delete_failed') }}</strong>
    </div>
</div>
@endif
@if (session('enable_success'))
<div class="d-flex justify-content-center">
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ session('enable_success') }}</strong>
    </div>
</div>
@endif
@if (session('enable_failed'))
<div class="d-flex justify-content-center">
    <div class="alert alert-error alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ session('enable_failed') }}</strong>
    </div>
</div>
@endif

<nav class="mt-4">
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link {{ $show[0] }}" id="nav-users-tab" data-toggle="tab" href="#nav-users" role="tab"
           aria-controls="nav-users" aria-selected="true">Users List</a>
        <a class="nav-item nav-link {{ $show[1] }}" id="nav-posts-tab" data-toggle="tab" href="#nav-posts" role="tab"
           aria-controls="nav-posts" aria-selected="false">Posts List</a>
    </div>
</nav>

<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade {{ $show[0] }}" id="nav-users" role="tabpanel" aria-labelledby="nav-users-tab">
        <form action="/admin/searchUser" method="get" class="justify-content-end mr-4 mt-5">
            <div class="row">
                <div class="col">
                    <input id="username"
                           type="text"
                           class="form-control"
                           name="username"
                           value="{{ $username }}"
                           placeholder="@lang('custom.searchUsername')"
                           autofocus
                           maxlength="20">
                </div>
                <div class="col">
                    <input id="email"
                           type="text"
                           class="form-control"
                           name="email"
                           value="{{ $email }}"
                           placeholder="@lang('custom.searchEmail')">
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">
                        @lang('custom.searchButton')
                    </button>
                </div>
            </div>
        </form>

        <div class="d-flex justify-content-center bg-primary mt-3">
            <h5 class="text-white my-2">Users List</h5>
        </div>
        <div class="d-flex table-responsive">
            <table class="table table-hover border border-primary">
                <thead>
                <tr>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email Address</th>
                    <th scope="col">Joined Date</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $data)
                <tr>
                    <td>{{ $data->first_name }}</td>
                    <td>{{ $data->last_name }}</td>
                    <td>{{ $data->username }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->created_at }}</td>
                    <td>
                        <a href="/admin/{{$data->id}}/remove" class="btn btn-outline-danger">Delete</a>
                        @if ($data->is_enabled)
                        <a href="/admin/{{$data->id}}/enable" class="btn btn-outline-success">Disable</a>
                        @else
                        <a href="/admin/{{$data->id}}/enable" class="btn btn-outline-secondary">Enable</a>
                        @endif
                    </td>
                </tr>
                @endforeach
                @if(count($users) == 0)
                <tr>
                    <td class="text-center" colspan="5">
                        <h5 class="text-muted">@lang('custom.emptyTable')</h5>
                    </td>
                </tr>
                @endif
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center">
            {{ $users->links() }}
        </div>
    </div>
    <div class="tab-pane fade {{ $show[1] }}" id="nav-posts" role="tabpanel" aria-labelledby="nav-posts-tab">
        <form action="/admin/searchPost" method="get" class="justify-content-end mr-4 mt-5">
            <div class="row">
                <div class="col">
                    <input id="title"
                           type="text"
                           class="form-control"
                           name="title"
                           placeholder="@lang('custom.searchTitle')"
                           autofocus
                           value="{{ $title }}"
                           maxlength="20">
                </div>
                <div class="col">
                    <input id="username"
                           type="text"
                           class="form-control"
                           name="username"
                           value="{{ $username }}"
                           placeholder="@lang('custom.searchUsername')">
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">
                        @lang('custom.searchButton')
                    </button>
                </div>
            </div>

        </form>
        <div class="border border-primary mt-3">
            <div class="d-flex justify-content-center bg-primary">
                <h5 class="text-white my-2">Posts List</h5>
            </div>
            <div class="d-flex ">

            </div>
        </div>
    </div>
</div>

@endsection
