
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
{{--    <script src="{{ asset('js/require.js') }}" defer></script>--}}

    <script src="{{ asset('js/app.js') }}" defer></script>

    <script src="{{ asset('js/server2.js') }}" defer></script>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body{ padding-bottom: 100px; }
        .level { display: flex;align-items: center; }
        .flex { flex: 1 }
    </style>
</head>
<body>
<div id="app">
    @include('layout.nav')

    <div>
        数据库被我drop了
    </div>
    <p id ='p'></p>
   {{-- <script>
        var p = document.getElementById('p');
        // let obj = ['a',3, 4]
       /* for (let v of 'obj') {
           p.innerHTML=v;
        }*/

        const x = y =>"welcome"+y;
        p.innerText= x;
    </script>--}}

</div>
</body>
</html>


