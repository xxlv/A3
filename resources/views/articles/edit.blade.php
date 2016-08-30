@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading pane-info">Post Detail </div>

                @if(session()->has('tips'))
                    <div class="alert alert-{{ session('tips')['status']}}">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ session('tips')['msg'] }}
                    </div>
                @endif
                @include('common.errors')

                <div class="panel-body">
                    <form action="{{ url('articles/'.$article->id) }}" method="POST" >

                        <div>
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" name="title" value="{{ $article->title}}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Label</label>
                                <input type="text" name="label" value="{{ $article->label}}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Content</label>
                                <textarea name="content" rows="8" cols="40" class="form-control">{{ $article->content }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="">Desc</label>
                                <input type="text" name="desc" value="{{ $article->desc}}" class="form-control">
                            </div>

                            <div class="form-group">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="put">
                                <input type="hidden" name="uid" value="{{ \Auth::id() }}">
                                <button type="submit" class="btn btn-primary">
                                    Updae it
                                </button>
                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
