@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading pane-info">Notifications</div>

                <div class="panel-body">

                    @if(Auth::user()->unreadNotifications()->count()>0)
                        <div class="alert alert-info" role="alert">
                         <i class="fa fa-bolt"></i> Notice : 你有 {{ Auth::user()->unreadNotifications()->count() }} 条未读消息
                         <a href="javascript:void(0)" onclick="event.preventDefault();document.getElementById('mark-as-read-form').submit();">Mark as read</a>

                         <form id="mark-as-read-form" action="/user/{{ Auth::id() }}/notifications/mark-as-read" method="POST"
                               style="display: none;">
                             {{ csrf_field() }}
                         </form>
                        </div>
                    @endif

                    <ul class="list-group">
                        @foreach($notifications as $notify)
                            @if($notify->type=='App\Notifications\DinnerNotice')
                                <li class="list-group-item">
                                    @if($notify->read_at)
                                        <span style="color:gray">
                                            [订餐提醒] 我已经帮你在 {{ $notify->created_at }} 自动订餐啦!
                                        </span>
                                    @else
                                        [<span class="text-primary">订餐提醒</span>]
                                            我已经帮你在 {{ $notify->created_at }} 自动订餐啦!
                                    @endif

                                </li>
                            @endif
                        @endforeach
                    </ul>

                    {{ $notifications->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
