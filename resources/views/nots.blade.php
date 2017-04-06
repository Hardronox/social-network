@extends('layouts.app')

@section('content')

        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Notifications</div>

                <div class="panel-body">
                    <ul class="list-group">
                        @foreach($nots as $not)
                            <li class="list-group-item">
                                {{$not->data['name']}} {{$not->data['message']}}
                                <span class="pull-right">{{$not->created_at->diffForHumans()}}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

@endsection
