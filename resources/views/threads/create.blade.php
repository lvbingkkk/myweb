@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create a New Thread</div>

                    <div class="panel-body">
                        <form method="post" action="/threads">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                            </div>

                            <div class="form-group">
                                <label for="channel">Channel</label>
                                <select  class="form-control" id="channel" name="channel_id">
                                    @foreach($channels as $channel )
                                    <option value="{{$channel->id}}">{{$channel->slug}}</option>
                                        }
                                    @endforeach
                                </select>

                            </div>

                            <div class="form-group">
                                <label for="body">Body</label>
                                <textarea name="body" id="body" class="form-control" rows="8">{{ old('body') }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Publish</button>

{{--                            //显示违法信息--}}
                            @if(count($errors))
                                <ul class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

