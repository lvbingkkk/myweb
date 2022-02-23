<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel-web-83接口</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>


            <div class="content">
                <div class="title m-b-md">
                    Laravel--web-登陆页面
                </div>
            </div>

    <div>
        @foreach($data as $str)
        <p>
            显示得到的数据库内容-名字：{{$str->name ?? '未获得数据'}}<br>
            显示得到的数据库内容-年龄：{{$str->age ?? '未获得数据'}}<br>
{{--            {{$str->sex ?? '未获得数据'}}<br>--}}

            显示得到的数据库内容-性别：@if(($str->sex ?? '' )=== '' )未获得数据 @elseif($str->sex==0) 女 @else 男 @endif<hr>

        </p>
            @endforeach
    </div>

    </body>
</html>
