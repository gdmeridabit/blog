@extends('layouts.app')

@section('content')
<div class="d-flex p-2 flex-row mt-5">
    <img src="{{ $dp }}" class="float-left profile" alt="" style="height:150px; max-width: 100%">
    <h1 class="mt-5 ml-3">{{ $user->first_name }} {{ $user->last_name }} <a href="/home/{{ Auth::user()->url }}/update"><i class="far fa-edit ml-3"></i></a></h1>
</div>
@endsection
