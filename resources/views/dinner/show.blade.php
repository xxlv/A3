@extends('layouts.app')



@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Dinner</div>
                    <div class="panel-body">
                        <div class="panel-info">
                            亲爱的 {{ $dinner->name }},已经帮你预定了 {{ $dinner->begin_at }} - {{ $dinner->end_at }} 期间的晚餐
                        </div>
                        <div class="panel-info">
                            届时将在 {{ $dinner->dinner_time  }} 自动订餐.
                            @if($dinner->auto_report)
                                并发送邮件到 {{$dinner->email}}
                            @endif

                        </div>
                        <div>
                            <a href="{{url('/dinner/edit')}}">编辑</a>
                            <a href="{{url('/dinner/delete/'.$dinner->id)}}">删除</a>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection