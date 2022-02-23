
@component('profiles.activities.activity')
    @slot('heading')
        <a href="{{$activity->subject->favorited->path()}}">{{ $profileUser->name }}  对下面这个回复点了赞</a>
    @endslot
    @slot('body')
        {{$activity->subject->favorited->body}}
    @endslot
@endcomponent
