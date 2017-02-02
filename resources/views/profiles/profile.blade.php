@extends('layouts.app')

@section('pageTitle', 'My Articles')

@section('content')
    <div class="container" >
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{$user->name}}'s profile
                </div>
                <div class="panel-body">
                    <img src="{{Storage::url("public/images/avatars/$user->avatar")}}" alt="" width="50px" height="50px">
                </div>
            </div>
        </div>
    </div>
@endsection
