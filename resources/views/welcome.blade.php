<?php
/*require_once __DIR__ . "/../php/email.php";
//##########################################
$smtpserver = "smtp.163.com";//SMTP������
$smtpserverport =25;//SMTP�������˿�
$smtpusermail = "";//SMTP���������û�����
$smtpemailto = "443647090@qq.com";//���͸�˭
$smtpuser = "";//SMTP���������û��ʺ�
$smtppass = "";//SMTP���������û�����
$mailsubject = "PHP100�����ʼ�ϵͳ";//�ʼ�����
$mailbody = "<h1> ����һ�����Գ��� PHP100.com </h1>";//�ʼ�����
$mailtype = "HTML";//�ʼ���ʽ��HTML/TXT��,TXTΪ�ı��ʼ�
##########################################
$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//�������һ��true�Ǳ�ʾʹ�������֤,����ʹ�������֤.
$smtp->debug = true;//�Ƿ���ʾ���͵ĵ�����Ϣ
$smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype);

$message = "";
if(mail("443647090@qq.com","通知","主页面打开")){
    mb_send_mail("443647090@qq.com","subject","contents");
    echo 'send';
    $message = "send!";
}else{
    echo ('not send');
    $message = 'not send';
}

*/?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="background-color: #295C82">
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
                color:#A9D730;
                padding: 0 25px;
                font-size: 14px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            #animation, #timer{
                color:#8DB5E6;
                font-size: 35px;
                width: 140px;
                height: 50px;
                position: absolute;

            }
            #timer{
                font-size: 25px;
                width: 250px;
                height: 50px;
                position: absolute;
                /*top:350px;*/

            }
        </style>



    </head>
{{--    <body style="background-color: #d82">--}}
{{--    <body style="background-color: #dd9920">--}}
<body style="background-color: #295C82">

{{--    <div class="flex-center position-ref <!--full-height-->" style="background-color:#295C82 ; ">--}}

    <div style=" position: absolute;width: 100% ;height: 860px;min-height: 480px;
                        background-color:#295C82;background: linear-gradient(145deg,  #292f52 ,#295C82); transform: skewY(7deg);transform-origin: 100%;
                        background-size: cover ">

    </div>

    <div class="flex-center position-ref <!--full-height-->" >
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="content">


                <div style="font-size:80px;float: left;margin-top: 180px;color:#A9D730">{{--🪐  🧪 🍑--}}

                    {{--<canvas id="canvas" style="width: 100px;height: 60px;border-radius:2% 80% 2% 90%;overflow:hidden;"></canvas>

                    <canvas id="canvas1" style="width: 100px;height: 60px;border-radius:80% 2% 90% 2%;overflow:hidden;"></canvas>--}}

                    <span> Welcom  To</span>
                </div>

                {{-- <script type="glsll">
    precision highp float;
    uniform float time1;
    uniform vec2 resolution1;

    vec3 firePalette(float i) {
    float T = 1400. + 1300.*i;
    vec3 L = vec3(5.0, 7.0, 8.3);
    L = pow(L,vec3(5.0)) * (exp(1.43876719683e5/(T*L))-1.0);
    return 1.0-exp(-5e8/L);
    }

    vec3 hash33(vec3 p) {
    float n = sin(dot(p, vec3(7, 157, 113)));
    return fract(vec3(2097152, 262144, 32768)*n);
    }

    float voronoi(vec3 p) {
    vec3 b, r, g = floor(p);
    p = fract(p);
    float d = 1.;
    for(int j = -1; j <= 1; j++) {
        for(int i = -1; i <= 1; i++) {
            b = vec3(i, j, -1);
            r = b - p + hash33(g+b);
            d = min(d, dot(r,r));
            b.z = 0.0;
            r = b - p + hash33(g+b);
            d = min(d, dot(r,r));
            b.z = 1.;
            r = b - p + hash33(g+b);
            d = min(d, dot(r,r));
        }
    }
    return d;
    }

    float noiseLayers(in vec3 p) {
    vec3 t = vec3(0., 0., p.z+time1);
    float tot = 0., sum = 0., amp = 1.;
    for (int i = 0; i < 6; i++) {
        tot += voronoi(p + t) * amp;
        p *= 2.0;
        t *= 1.5;
        sum += amp;
        amp *= 0.5;
    }
    return tot/sum;
    }

    void main(void) {
    vec2 uv = (gl_FragCoord.xy - resolution1.xy*0.5)/ resolution1.y;
    vec3 rd = normalize(vec3(uv.x, uv.y, 3.1415/8.));
    float c = noiseLayers(rd*4.);
    vec3 col = firePalette(c);
    gl_FragColor = vec4(sqrt(col), 1.);
    }
    </script>--}}
                {{--  <script type="glsl">
    precision highp float;
    uniform float time;
    uniform vec2 resolution;

    vec3 firePalette(float i) {
    float T = 1400. + 1300.*i;
    vec3 L = vec3(8.0, 6.6, 7.9);
    L = pow(L,vec3(5.0)) * (exp(1.43876719683e5/(T*L))-1.0);
    return 1.0-exp(-5e8/L);
    }

    vec3 hash33(vec3 p) {
    float n = sin(dot(p, vec3(7, 157, 113)));
    return fract(vec3(2097152, 262144, 32768)*n);
    }

    float voronoi(vec3 p) {
    vec3 b, r, g = floor(p);
    p = fract(p);
    float d = 1.;
    for(int j = -1; j <= 1; j++) {
        for(int i = -1; i <= 1; i++) {
            b = vec3(i, j, -1);
            r = b - p + hash33(g+b);
            d = min(d, dot(r,r));
            b.z = 0.0;
            r = b - p + hash33(g+b);
            d = min(d, dot(r,r));
            b.z = 1.;
            r = b - p + hash33(g+b);
            d = min(d, dot(r,r));
        }
    }
    return d;
    }

    float noiseLayers(in vec3 p) {
    vec3 t = vec3(0., 0., p.z+time);
    float tot = 0., sum = 0., amp = 1.;
    for (int i = 0; i < 6; i++) {
        tot += voronoi(p + t) * amp;
        p *= 2.0;
        t *= 1.5;
        sum += amp;
        amp *= 0.5;
    }
    return tot/sum;
    }

    void main(void) {
    vec2 uv = (gl_FragCoord.xy - resolution.xy*0.5)/ resolution.y;
    vec3 rd = normalize(vec3(uv.x, uv.y, 3.1415/8.));
    float c = noiseLayers(rd*4.);
    vec3 col = firePalette(c);
    gl_FragColor = vec4(sqrt(col), 1.);
    }
    </script>--}}
                {{--  <script>
                    let gl1 = canvas1.getContext('webgl');
                    gl1.bindBuffer(gl1.ARRAY_BUFFER, gl1.createBuffer());
                    gl1.bufferData(gl1.ARRAY_BUFFER, new Float32Array([-1,3,-1,-1,3,-1]), gl1.STATIC_DRAW);

                    let pid1 = gl1.createProgram();
                    shader(`attribute vec2 v1;void main(void){gl_Position=vec4(v1,0.,1.);}`,gl1.VERTEX_SHADER);
                    shader(document.querySelector(`script[type="glsll"]`).textContent,gl1.FRAGMENT_SHADER);
                    gl1.linkProgram(pid1);
                    gl1.useProgram(pid1);

                    let v1 = gl1.getAttribLocation(pid1, "v1");
                    gl1.vertexAttribPointer(v1, 2, gl1.FLOAT, false, 0, 0);
                    gl1.enableVertexAttribArray(v1);

                    let resolution1 = gl1.getUniformLocation(pid1, 'resolution1');
                    let time1 = gl1.getUniformLocation(pid1, 'time1');
                    let fill1 = gl1.getUniformLocation(pid1, 'fill1');
                    requestAnimationFrame(draw);

                    function draw(t) {
                        gl1.uniform1f(time1, t/1000);
                        gl1.drawArrays(gl1.TRIANGLES, 0, 3);
                        requestAnimationFrame(draw);
                    }

                    function shader(src, type) {
                        let sid = gl1.createShader(type);
                        gl1.shaderSource(sid, src);
                        gl1.compileShader(sid);
                        var message = gl1.getShaderInfoLog(sid);
                        gl1.attachShader(pid1, sid);
                        if (message.length > 0) {
                            console.log(src.split("\n").map((str, i) =>
                                (""+(1+i)).padStart(4, "0")+": "+str).join("\n"));
                            throw message;
                        }
                    }

                    addEventListener('resize', function(){
                        if (innerWidth === canvas1.width &&
                            innerHeight === canvas1.height )
                            return;
                        canvas1.width = innerWidth;
                        canvas1.height = innerHeight;
                        gl1.uniform2f(resolution1, gl1.drawingBufferWidth, gl1.drawingBufferHeight);
                        gl1.viewport(0, 0, gl1.drawingBufferWidth, gl1.drawingBufferHeight);
                    })

                    dispatchEvent(new Event('resize'))
                </script>--}}
                {{--  <script>
                    let gl = canvas.getContext('webgl');
                    gl.bindBuffer(gl.ARRAY_BUFFER, gl.createBuffer());
                    gl.bufferData(gl.ARRAY_BUFFER, new Float32Array([-1,3,-1,-1,3,-1]), gl.STATIC_DRAW);

                    let pid = gl.createProgram();
                    shader(`attribute vec2 v;void main(void){gl_Position=vec4(v,0.,1.);}`,gl.VERTEX_SHADER);
                    shader(document.querySelector(`script[type="glsl"]`).textContent,gl.FRAGMENT_SHADER);
                    gl.linkProgram(pid);
                    gl.useProgram(pid);

                    let v = gl.getAttribLocation(pid, "v");
                    gl.vertexAttribPointer(v, 2, gl.FLOAT, false, 0, 0);
                    gl.enableVertexAttribArray(v);

                    let resolution = gl.getUniformLocation(pid, 'resolution');
                    let time = gl.getUniformLocation(pid, 'time');
                    let fill = gl.getUniformLocation(pid, 'fill');
                    requestAnimationFrame(draw);

                    function draw(t) {
                        gl.uniform1f(time, t/1000);
                        gl.drawArrays(gl.TRIANGLES, 0, 3);
                        requestAnimationFrame(draw);
                    }

                    function shader(src, type) {
                        let sid = gl.createShader(type);
                        gl.shaderSource(sid, src);
                        gl.compileShader(sid);
                        var message = gl.getShaderInfoLog(sid);
                        gl.attachShader(pid, sid);
                        if (message.length > 0) {
                            console.log(src.split("\n").map((str, i) =>
                                (""+(1+i)).padStart(4, "0")+": "+str).join("\n"));
                            throw message;
                        }
                    }

                    addEventListener('resize', function(){
                        if (innerWidth === canvas.width &&
                            innerHeight === canvas.height )
                            return;
                        canvas.width = innerWidth;
                        canvas.height = innerHeight;
                        gl.uniform2f(resolution, gl.drawingBufferWidth, gl.drawingBufferHeight);
                        gl.viewport(0, 0, gl.drawingBufferWidth, gl.drawingBufferHeight);
                    })

                    dispatchEvent(new Event('resize'))
                </script>--}}





                <div style="clear: both"></div>


                {{--                <div style="position: relative;">--}}
                <div  id="animation" ><a href="/maotou" style="text-decoration: none;">🦉 </a>-->-></div>
                <br><br>


                <div  id="timer"><p>rrr</p></div>
                {{--                </div>--}}

                <div style="clear: both"></div>
                <br> <br> <br> <br><br><br><br><br><br><br>
                <div class="title m-b-md" style="color:#55A5FF;float: right">

                    <?php

//                        echo date("l d/m/y h:i:s:u a",time())
//                    echo $message;
                    ?>
                    Ikoeng's Magic Lab<br>
                    {{--                    Ikoeng's魔法实验室<br>--}}
                    <span style="color:#8DB5E6;font-size: 50px;float: right">--The 83rd Port<!--&#45;&#45;第83接口-->
                            <hr style="background-color:#11d1d1;/*background:#1c7;*/height: 1.5px;border: none"></span>
                </div>
                <div style="clear: both">
                    {{--                    <div class="links" style="background-color: #e17723">--}}

                    <div class="links" >
                        <a href="/threads"> 论 坛 </a>
                        <a href="http://314843358h.imdo.co/">我的魔法学院</a>
                        <a href="http://314843358h.imdo.co/register.php">魔法学院通行证</a>
                        <a href="/colors">调色板</a>
                        <a href="/armies">军队系统（有待改善）</a>


                        <a href="http://314843358h.imdo.co/study/yanzhengma.php">双色球生成器</a>
                        <a href="/yuansu">元素周期表</a>
                        <a href="https://github.com/laravel/laravel">GitHub</a>
                    </div>
                </div>
                {{--<div style="margin-top: 39px;float: left">
                    <hr>
                    <?php
                    echo $_SERVER['HTTP_HOST'];echo '<br>';
                    echo $_SERVER['PHP_SELF'];echo '<br>';
                    echo $_SERVER['SERVER_ADDR'];echo '<br>';
                    echo $_SERVER['SERVER_NAME'];echo '<br>';
                    echo $_SERVER['REMOTE_ADDR'];echo '<br>';
                    echo $_SERVER['SERVER_PORT'];echo '<br>';
                    echo $_SERVER['REMOTE_PORT'];echo '<br>';
                    echo $_SERVER['SCRIPT_FILENAME'];echo '<br>';
                    echo $_SERVER['SCRIPT_NAME'];echo '<br>';
    //                    echo $_SERVER['SCRIPT_URI'];echo '<br>';
    //                    echo $_SERVER['REMOTE_HOST'];echo '<br>';
                    ?>
                </div>--}}

            </div>
        </div>

</body>
</html>

<script>
    // var w = screen.width;
    // var w = document.documentElement.clientWidth;


    // var pos=-220;
    var pos =0;
    var box = document.getElementById("animation");
    var timer = document.getElementById("timer");
    var pos2=document.body.clientWidth-220;
    var t = setInterval(move, 20);

    function move() {

        var d = new Date();
        var y = d.getFullYear();
        var mo = d.getMonth()+1;
        if (mo < 10) {
            mo="0"+mo;
        }
//这个是星期几。。！！
        /*var day = d.getDay();
        if (day < 10) {
            day="0"+day;
        };*/

        var day = d.getDate();
        if (day<10) {
            day="0"+day;
        }

        var h = d.getHours();
        if (h < 10) {
            h="0"+h;
        }

        var m = d.getMinutes();
        if (m < 10) {
            m="0"+m;
        }

        var s = d.getSeconds();
        if (s < 10) {
            s="0"+s;
        }


        var w = document.body.clientWidth;
        timer.innerHTML = y+"-"+mo+"-"+day+"/" +h+":"+m+":"+s;
        /*从右侧直接闪到左侧：
        if (pos >= w+60) {
            pos=-220;
            // clearInterval(t);
        }
        else {
            pos += 0.5;
            box.style.left = pos+"px";
            timer.style.left = pos-40+"px";

        }*/

        //左右两侧来回跑：调整窗口的时候会有bug，缩小的时候解决了，扩宽窗口的bug有待解决；；
        //烧脑；；；；
        if (pos >= w-220 ) {

            if (pos2 > 0 && pos2<=w-220) {
                pos2 -=1;
                box.style.left = pos2+"px";
                timer.style.left = pos2-40+"px";
            }
            //解决缩小窗口宽度问题
            else if (pos2>w-220) {
                pos2 =w-220-1;
                box.style.left = w-220+"px";
                timer.style.left = w-40-220+"px";
            }
            else {
                pos = 0;
                pos2 = w-220;
            }

        }else{
            pos +=1;
            box.style.left = pos+"px";
            timer.style.left = pos-40+"px";
            //解决扩宽窗口位置跳动问题
            pos2=w-220;

        }

    }
</script>
