@extends('layout.app')

@section('content')
    <!--inline-template必须有，要不不显示-->

    <thread-view :initial-replies-count="{{$thread->replies_count}}" inline-template>
        <div class="container">
            <div class="row ">
                <div class="col-md-8 ">
                    <div class="card">
                        <div class="card-header" style="font-size: large">
                            <div class="level">
                                <span class="flex">
                                    <a href="{{ route('profile',$thread->creator) }}" >{{ $thread->creator->name }}</a> 发表了：
                                    {{ $thread->title }}
                                </span>

                                @can('update',$thread)
                                    <form action="{{ $thread->path() }}" method="POST" onsubmit="return confirm('确定要删除该话题？')">

                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button   class="btn btn-link">删除帖子</button>

                                    </form>
                                @endcan

                            </div>
                        </div>

                        <div class="card-body">
                            {{ $thread->body }}
                        </div>
                    </div>

                    <replies {{--:data="{{ $thread->replies }}"--}} @added="repliesCount++" @removed="repliesCount--"></replies>

                    {{--@foreach ($replies as $reply)--}}
                    {{--@include('threads.reply')--}}
                    {{--@endforeach--}}

                    {{--{{ $replies->links() }}--}}



                    {{--@if (auth()->check())
                        <form method="post" action="{{ $thread->path() . '/replies' }}">

                            {{ csrf_field() }}

                            <div class="form-group" style="margin-top: 10px;">
                                <textarea name="body" id="body" class="form-control" placeholder="说点什么吧..."rows="5"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">提交</button>
                        </form>
                    @else
                        <p class="text-center">请先<a href="{{ route('login') }}">登录</a>，然后再发表回复 </p>
                    @endif--}}
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">

                        <div class="card-title">
                            <p>
                                <a href="#">{{ $thread->creator->name }}</a> 发布于 {{ $thread->created_at->diffForHumans() }},
                                当前共有 <span v-text="repliesCount"></span> 个回复。
                            </p>
                            @if (auth()->check())
                            <p>
                                {{--<subscribe-button :active="{{ json_encode($thread->isSubscribedTo)}} || active"
                                    @change-active="active = !active"></subscribe-button>--}}

                                <subscribe-button :active="{{ json_encode($thread->isSubscribedTo)}} "></subscribe-button>
                            </p>
                                @endif
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </thread-view>

    @if(count($errors))
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
@endsection
