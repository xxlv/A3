@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading pane-info "><b style="color:#000">{{ $article->title }} </b> <span class="pull-right"></span></div>

                @if(session()->has('tips'))
                    <div class="alert alert-{{ session('tips')['status']}}">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ session('tips')['msg'] }}
                    </div>
                @endif
                <div class="panel-body">
                    {!! $article->content !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
