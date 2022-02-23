
@component('profiles.activities.activity')
    @slot('heading')
        <a href="{{ route('profile',$profileUser) }}">{{ $profileUser->name }}</a> 发表了话题：
        <a href="{{ $activity->subject->path() }}">{{ $activity->subject->title }}</a>
    @endslot
    @slot('body')
        {{$activity->subject->body}}
    @endslot
@endcomponent
