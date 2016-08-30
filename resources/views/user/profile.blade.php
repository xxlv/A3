@extends('layouts.app')

@section('css')
    <link href="/css/profile.css" rel="stylesheet">
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading pane-info">Profile</div>

                    @if(session()->has('tips'))
                        <div class="alert alert-{{ session('tips')['status']}}">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {{ session('tips')['msg'] }}
                        </div>
                    @endif


                    <div class="panel-body">

                        <form action="/profile" method="post" class="form-group-sm" enctype="multipart/form-data">

                            <div class="form-group">
                                @if(Auth::user()->avatar)
                                    <img  style="
                                    position: relative;
                                    background-position: center!important;
                                    background-repeat: no-repeat!important;
                                    background-size: cover!important;
                                    background-color: #ededed;
                                    border-radius: 50%" width="100px;" height="100px;"src="{{ asset(Storage::disk()->url(Auth::user()->avatar)) }}" alt="{{ Auth::user()->name }} 's avatar'" />
                                @endif
                                <label for="">Avatar </label>
                                <input type="file" name="avatar"  class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Email </label>
                                <input type="email" name="email" value="{{ Auth::user()->email }}"  class="form-control" readonly>
                            </div>



                            <div class="form-group">
                                <label for="">Name </label>
                                <input type="text" name="name" value="{{ Auth::user()->name }}"  class="form-control">
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Update"  class="btn btn-primary" >
                            </div>

                            {{  csrf_field() }}
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
