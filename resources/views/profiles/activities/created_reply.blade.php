
@component('profiles.activities.activity')
    @slot('heading')
        <a href="{{ route('profile',$profileUser) }}">{{ $profileUser->name }}</a> 回复了：
        <a href="{{ $activity->subject->thread->path() }}">{{ $activity->subject->thread->title }}</a>
    @endslot
    @slot('body')
        {{$activity->subject->body}}
    @endslot
@endcomponent
