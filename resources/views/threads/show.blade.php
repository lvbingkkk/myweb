@extends('layout.app')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-8 ">
            <div class="card">
                <div class="card-header" style="font-size: large">
                    <div class="level">
                        <span class="flex">
                            <a href="{{ route('profile',$thread->creator) }}" >{{$thread->creator->name}} </a> 发表了：
                        {{$thread->title}}

                        </span>

                        @can('update',$thread)
                            <form action="{{ $thread->path() }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="submit" class="btn btn-link">删除帖子</button>
                            </form>
                        @endcan
                    </div>

                </div>
                <div class="card-body">

                    {{$thread->body}}

                </div>
            </div>
{{--            注意 $thread->replies() 跟 $thread->replies 的区别：--}}
{{--            $thread->replies() 返回的是一个 hasMany 对象，--}}
{{--            而 $thread->replies 返回的是一个 Collection 集合。--}}

            @foreach($replies as $reply)
                @include('threads.reply')
            @endforeach

{{--            分页--}}
{{--            {{ $replies->links() }}--}}

            @if(auth()->check()){{--已登陆用户才可见--}}

                    <form method="post" action="{{ $thread->path().'/replies' }}">
                        @csrf
                        {{--                    {{ csrf_field() }}--}}
                        <div class="form-group" style="margin-top: 10px">
                            <textarea name="body" id="body" class="form-control" placeholder="说点什么吧..."rows="5"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">提交</button>
                    </form>
            @else
                        <p class="text-center">请先<a href="{{ route('login') }}">登录</a>，然后再发表回复 </p>
                    @endif
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">

{{--                               $thread->replies() 返回的是一个 hasMany 对象，--}}

                    <p>
                        <a href="#">{{ $thread->creator->name }}</a> 发布于 {{ $thread->created_at->diffForHumans() }},

{{--                                当前共有 {{ $thread->replies()->count() }} 个回复--}}

                        当前共有 {{ $thread->replies_count }} 个回复
                    </p>
                </div>

                </div>
            </div>
        </div>
    </div>
</div>


    @if(count($errors))
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif


@endsection
