<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">


        {{--<div class="collapse navbar-collapse" id="app-navbar-collapse">
            <ul class="navbar-brand" >
                <li class="nav-item dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-hidden="true"
                       aria-expanded="false">帖子总览<span class="caret"></span> </a>

                    <ul class="dropdown-menu">
                        <li><a href="/threads">&nbsp; 全部帖子</a> </li>

                        @if(auth()->check())
                        <li><a href="/threads?by={{ auth()->user()->name }}"> &nbsp; 我的帖子</a> </li>
                        @endif

                        <li><a href="/threads?popularity=1" > &nbsp; 热门帖子 </a></li>

                    </ul>
                </li>

                <li class="dropdown" style="margin-top: auto;margin-right:15px">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-hidden="true"
                       aria-expanded="false"> &nbsp; 帖子分类 <span class="caret"></span> </a>
                    <ul class="dropdown-menu">
                        @foreach($channels as $channel)
                        <li><a href="/threads/{{ $channel->slug }}">&nbsp; {{ $channel->slug }}</a> </li>
                        @endforeach
                    </ul>
                </li>

                <li class="nav-item" style="margin-top: auto;margin-right:15px"><a href="/threads/create">&nbsp; {{__('发表帖子 ')}}</a></li>
            </ul>
        </div>--}}

{{--下面这个是手机上显示好像--}}
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <ul class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{__('实验室接口')}}
                </a>

                <div class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        帖子总览
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        @if(auth()->check())
                            <a class="dropdown-item" href="/threads?by={{ auth()->user()->name }}">{{ __('我的帖子') }}</a>
                        @endif
                        <a class="dropdown-item" href="/threads">{{ __('全部帖子') }}</a>

                        <a class="dropdown-item" href="/threads?popularity=1">{{ __('热门帖子') }}</a>

                        <a class="dropdown-item" href="/threads?unanswered=1">{{ __('无回复帖') }}</a>


                    </ul>
                </div>

                <div class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        帖子分类
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        @foreach($channels as $channel)
                            <a class="dropdown-item" href="/threads/{{ $channel->slug }}">{{$channel->slug}}</a>
                        @endforeach
                    </ul>

                </div>

                <div class="nav-item ">
                    <a class="nav-link " href="/threads/create" >
                        {{__('发表帖子 ')}}
                    </a>
                </div>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else

                    <user-notifications ></user-notifications>

                <div class="nav-item dropdown">




                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>


                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                        <a class="dropdown-item" href="{{ route('profile',Auth::user()) }}">👤 &nbsp;  &nbsp;  {{ __('个人中心') }}</a>




                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            ➡️  &nbsp;  &nbsp; {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </div>
                @endguest
            </ul>
        </ul>
    </div>
</nav>
