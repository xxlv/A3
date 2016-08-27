@if(isset($tips))
    <div class="alert alert-{{ $tips['level'] }} alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        <strong>{{ $tips['title'] }}</strong> {{ $tips['content'] }}.
    </div>
@endif
