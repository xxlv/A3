@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading pane-info">{{ $article->title }} <span class="pull-right"><a href="{{ url('articles/create') }}">Post a new article</a></span></div>

                @if(session()->has('tips'))
                    <div class="alert alert-{{ session('tips')['status']}}">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ session('tips')['msg'] }}
                    </div>
                @endif
                <div class="panel-body">
                    {{ $article->content }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
