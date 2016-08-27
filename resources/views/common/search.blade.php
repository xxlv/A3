@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="alert alert-info">Search Result 共查询到 {{ count($searchList) }} 条</div>
                    </div>

                    <div class="panel-body">

                        <ul class="list-group">

                            @foreach($searchList as $search)

                                <li class="list-group-item">{{ $search['name'] }} ({{ $search['email'] }}) At  {{ $search['dinner_time'] }}</li>

                            @endforeach
                        </ul>

                    </div>
                </div>
            </div>
        </div>
@endsection
