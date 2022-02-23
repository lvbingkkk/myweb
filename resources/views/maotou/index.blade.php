@extends('layout.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
           {{-- @forelse($threads as $thread)
            <div class="card" >
                <div class="card-header">
                    <div class="level">
                        <h4 class="flex">
                            <a href="{{ $thread->path() }}">

                                @if(auth()->check() && $thread->hasUpdatesFor(auth()->user()))

                                        {{ $thread->title }}
                                @elseif(! auth()->check())
                                    {{ $thread->title }}

                                @else
                                    <p style="color: #adb5bd;text-decoration: line-through;">
                                    {{ $thread->title }}
                                    </p>
                                @endif

                                {{ $thread->title }}
                            </a>
                        </h4>
                        <a href="{{ $thread->path() }}">

                          {{$thread->creator->lastReply->wasJustPublished()}}//
                            {{ $thread->replies_count }} {{ Str::plural('reply',$thread->replies_count) }}
                        </a>
                    </div>
                </div>
                <div class="card-body" >
                    {{$thread->body}}
                </div>
            </div>--}}
               {{-- <br>
                @empty
                    <p>There are no relevant results at this time.</p>
                @endforelse--}}

            <p></p>
            <h1 style="letter-spacing:5px;">你是为数不多点我的噢 😯  ！！！🦉</h1>
        </div>
        </div>
    </div>
</div>
@endsection
