@extends('layouts.app')

@section('pageTitle', 'My Profile')

@section('content')
    <div class="container" >
        <div class="content" >
            <div class="col-md-6">
                @if ($user->password=='new users password')
                    <span id="profile_info" class="glyphicon glyphicon-info-sign" data-toggle="tooltip" data-placement="top"
                          title="Test account has been created for you! You can edit your personal information and choose new password. After that, you can login via social and this new account!"></span>
                @endif

                @if(Auth::id() !== $user->id)
                    <div class="panel panel-default" id="app">
                        <div class="panel-body">
                            <friend :profile_user_id="{{$user->id}}"></friend>
                        </div>
                    </div>
                @endif
                <table class="table table-striped table-hover profile" >
                    <tr>
                        <th>Avatar</th>
                        <td>
                            <img src="{{Storage::url("public/images/avatars/$user->avatar")}}" alt="" width="50px" height="50px">
                        </td>
                    </tr>
                    <tr>
                        <th>UserName</th>
                        <td>
                            {{$user->name}}
                        </td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>
                            {{$user->email}}
                        </td>
                    </tr>
                    <tr>
                        <th>FirstName</th>
                        <td>
                            {{$user->profile->firstname ?? 'No information'}}
                        </td>
                    </tr>
                    <tr>
                        <th>LastName</th>
                        <td>
                            {{$user->profile->lastname ?? 'No information'}}
                        </td>
                    </tr>
                    <tr>
                        <th>Actions</th>
                        <td>
                            <button class="btn btn-warning edit" >Edit Profile</button>
                            <a id="delete" class="btn btn-danger" href="{{ url("/profile/delete")}}" >Delete Account</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

@endsection
