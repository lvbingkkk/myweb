@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-md-offset-2">
                <div class="page-header">
                    <h1>
                        {{ $profileUser->name }}
                        <small>注册于{{ $profileUser->created_at->diffForHumans() }}</small>
                    </h1>
                </div>
                <hr>
                {{--@foreach($threads as $thread)
                    <div class="card" style="margin-bottom: 10px;">
                        <div class="card-header">
                            <div class="level">
                                <span class="flex">
                                    <a href="{{ route('profile',$thread->creator) }}">{{ $thread->creator->name }}</a> 发表了：
                                   <a href="{{$thread->path()}}"> 《{{ $thread->title }}》</a>
                                </span>

                                <span>{{ $thread->created_at->diffForHumans() }}</span>
                            </div>
                        </div>

                        <div class="card-body">
                            {{ $thread->body }}
                        </div>
                    </div>
                @endforeach
                {{ $threads->links() }}--}}

                @forelse($activities as $date=>$activity)
                    <h3 class="page-item">{{$date}}</h3>
                    @foreach($activity as $record)
                        @if(view()->exists("profiles.activities.{$record->type}"))
                            @include("profiles.activities.{$record->type}",['activity'=>$record])
                        @endif
                    @endforeach
                @empty
                    <p>当前用户暂时没有动态。。。</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
