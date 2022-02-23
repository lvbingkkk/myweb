@forelse($threads as $thread)
    <div class="card" >
        <div class="card-header">
            <div class="level">
                <h4 class="flex">
                    <a href="{{ $thread->path() }}">

                        @if(auth()->check() && $thread->hasUpdatesFor(auth()->user()))

                            <p>{{ $thread->title }}</p>
                        @elseif(! auth()->check())
                            <p>{{ $thread->title }}</p>

                        @else
                            <p style="color: #adb5bd;text-decoration: line-through;">
                                {{ $thread->title }}
                            </p>
                        @endif

                        {{--                                {{ $thread->title }}--}}
                    </a>

                    <p style="font-size: 0.85em ">

                        Posted By:<a href="{{ route('profile',$thread->creator) }}">{{ $thread->creator->name  }}&nbsp;  </a>
                    </p>
                </h4>


                <a href="{{ $thread->path() }}">

                    {{--                          {{$thread->creator->lastReply->wasJustPublished()}}//--}}
                    &nbsp {{ $thread->replies_count }} {{ Str::plural('reply',$thread->replies_count) }}
                </a>
            </div>
        </div>
        <div class="card-body" >
            {{$thread->body}}
        </div>
    </div>
    <br>



@empty
    <p>There are no relevant results at this time.</p>
@endforelse