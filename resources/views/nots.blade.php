@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Notifications</div>

                <div class="panel-body">
                    <ul class="list-group">
                        @foreach($nots as $not)
                            <li class="list-group-item">
                                {{$not->}}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
