@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading pane-info">My Article Lists
                    <span class="pull-right">
                        <a href="{{ url('label/create') }}">New Label</a>   |
                        <a href="{{ url('articles/create') }}">New Article</a>
                    </span>
                </div>
                @if(session()->has('tips'))
                    <div class="alert alert-{{ session('tips')['status']}}">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ session('tips')['msg'] }}
                    </div>
                @endif
                
                <div class="panel-body">
                    <ul class="list-group">

                        @foreach($articles as $article)
                            <li class="list-group-item">
                                <a href="{{ url('articles/'.$article->id) }}">{{ $article->title }}</a>
                                <span class="pull-right">
                                    <a href="/articles/{{ $article->id }}/edit" class="btn btn-sm btn-info">Edit</a>
                                    <a href="/articles/{{ $article->id }}/destory" class='btn btn-sm btn-danger' class='deleteArticle' data-id="{{ $article->id }}">Delete</a>
                                    <a href="/articles/{{ $article->id }}/publish" class="btn btn-sm btn-primary">Publish</a>
                                </span>
                            </li>

                        @endforeach
                    </ul>

                    {{ $articles->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
