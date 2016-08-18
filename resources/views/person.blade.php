@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/person') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('real_name') ? ' has-error' : '' }}">
                                <label for="real_name" class="col-md-4 control-label">Real Name</label>

                                <div class="col-md-6">
                                    <input id="real_name" type="text" class="form-control" name="real_name" value="{{ old('real_name') }}">

                                    @if ($errors->has('real_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('real_name') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>

                            <div class="form-group{{ $errors->has('sex') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Sex</label>

                                <div class="col-md-6">

                                    <select class="form-control" name="sex" id="sex">
                                        <option value="0">女</option>
                                        <option value="1">男</option>
                                    </select>

                                    @if ($errors->has('sex'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('sex') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>


                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
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
