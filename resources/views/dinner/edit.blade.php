@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Dinner</div>
                    @include('common.errors')
                  
                    @if($dinner)
                        <div class="panel-body">
                            <div class="container">
                                <form action="/dinner/store" method="POST">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <input type="text" name="name" value="{{ $dinner->name }}"
                                                   class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Begin Date</label>
                                            <input type="date" name="begin_at" value="{{ $dinner->begin_at }}"
                                                   class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="">End Date</label>
                                            <input type="date" name="end_at" value="{{ $dinner->end_at }}"
                                                   class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Dinner time</label>
                                            <input type="time" name="dinner_time" value="{{ $dinner->dinner_time }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Auto report</label>
                                            <select name="auto_report" id="">

                                                <option value="1" @if($dinner->auto_report)selected @endif>True</option>
                                                <option value="0" @if(!$dinner->auto_report)selected @endif>False
                                                </option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="email" name="email" value="{{ $dinner->email }}"
                                                   class="form-control">
                                        </div>

                                        <div class="form-group">

                                            {{ csrf_field() }}
                                            <input type="hidden" name="id" value="{{$dinner->id}}">

                                            <button type="submit" class="btn btn-primary">
                                                Dinner for me
                                            </button>
                                        </div>

                                    </div>

                                </form>

                            </div>
                        </div>
                    @else

                        <div class="panel-body">
                            <div class="container">
                                <form action="/dinner/store" method="POST">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <input type="text" name="name" value="{{ Auth::user()->name }}"
                                                   class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Begin Date</label>
                                            <input type="date" name="begin_at" value="{{ date('m/d/Y') }}"
                                                   class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="">End Date</label>
                                            <input type="date" name="end_at" value=""
                                                   class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Dinner time</label>
                                            <input type="time" name="dinner_time" value="">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Auto report</label>
                                            <select name="auto_report" id="">

                                                <option value="1">True</option>
                                                <option value="0">False
                                                </option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="email" name="email" value=""
                                                   class="form-control">
                                        </div>

                                        <div class="form-group">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-primary">
                                                Dinner for me
                                            </button>
                                        </div>

                                    </div>

                                </form>

                            </div>
                        </div>
                        <script>
                            $("#datepicker").datepicker("setDate", new Date());
                        </script>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
