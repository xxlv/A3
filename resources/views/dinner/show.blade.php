@extends('layouts.app')



@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Dinner</div>
                    <div class="panel-body">

                        <div class="text-info">
                            亲爱的 {{ $dinner->name }} 同学 ,我已经帮你预定了 <b class='text-danger'>{{ $dinner->begin_at }}
                                - {{ $dinner->end_at }}</b> 期间的晚餐
                            将在<b class="text-danger"> {{ $dinner->dinner_time  }}</b>
                            自动订餐.
                            @if($dinner->auto_report)
                                订餐结果将发送邮件到 {{$dinner->email}}
                            @endif

                        </div>
                        <hr/>
                        <div>
                            <a href="{{url('/dinner/edit')}}" class="btn btn-primary">Update</a>
                            <a href="{{url('/dinner/delete/'.$dinner->id)}}" class="btn btn-danger">Delete</a>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
