<reply :attributes="{{$reply}}" inline-template>
    <div id="reply-{{ $reply->id }}" class="card" style="margin-top: 15px;margin-bottom: 15px;">
        <div class="card-header">
            <div class="level">
                <h5 class="flex">
                    <a href="{{ route('profile',$reply->owner) }}"> {{ $reply->owner->name }}</a>
                    回复于
                    {{ $reply->created_at->diffForHumans() }}
                </h5>
{{--                @if(Auth::check())--}}
                    <div>
                        <favorite :reply="{{$reply}}" {{Auth::check() ? '' :'disabled'}}></favorite>
                        {{--<form method="POST" action="/replies/{{ $reply->id }}/favorites">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-primary" {{ $reply->isFavorited() ? 'disabled' : '' }}>
                                {{ $reply->favorites_count }} {{ Str::plural('Favorite',$reply->favorites_count) }}
                                {{ $reply->favorites()->count() }} {{ Str::plural('Favorite',$reply->favorites()->count()) }}
                            </button>
                        </form>--}}
                    </div>
{{--                @endif--}}
            </div>
        </div>
        <div  class="card-body">
            <div v-if="editing">
                <div class="form-group">
                    <textarea class="form-control" v-model="body"></textarea>
                </div>

                <button class="btn btn-xs btn-primary" @click="update">保存</button>
                <button class="btn btn-xs btn-link" @click="editing =false">取消</button>
            </div>


            <div v-else v-text="body">
{{--                {{ $reply->body }}--}}
            </div>
        </div>


        @can('update',$reply)
            <div class="card-footer level">
                <button class="btn btn-xs btn-info mr-1" @click="editing = true">编辑</button>
                <button class="btn btn-xs btn-danger mr-1" @click="destroy">删除</button>
                {{--<form method="POST" action="/replies/{{ $reply->id }}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <button type="submit" class="btn btn-danger btn-xs">Delete</button>--}}
                </form>
            </div>
        @endcan
    </div>
</reply>
