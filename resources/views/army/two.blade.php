@extends('army.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 "style="padding-top: 65px;text-align:center;border-style: solid;border-color: #ae1c17">
                <a href="/five/{{$army->num}}" style="color:  #dda238">

                    <div class="btn btn-primary btn-lg btn-block" style="background-color: #dda238;font-size: 55px;color: #ae1c17">
                       {{$army->name}}
                    </div>
                </a>
                <div class="col-md-4 "style="float:right;margin-top:35px;margin-bottom: 220px; padding:40px 25px 45px ;border:2px solid #ee9933;">
                    番号 ：{{$army->title}}
                </div>
                <div style="clear:both;"></div>
                <div class="row" >
                            <div class="col-md-6">
                                <a href="/five/{{$army->ftitle}}" style="color: #ffffff">
                                    <div style="background-color: #11a2a8;padding-top: 30px;padding-bottom: 62px;" class="btn btn-primary btn-lg btn-block">
                                        <span style="font-size: 14px;float: right;padding-right: 25px;">番号：{{$army->ftitle}} </span>
                                        <br><br>
                                        <span style="padding-right: 25px;font-size: 25px">{{$army->first}} </span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6" >
                                <a href="/five/{{$army->stitle}}" style="color: #ffffff">
                                   <div style="background-color: #11a2a8;padding-top: 30px;padding-bottom: 62px;" class="btn btn-primary btn-lg btn-block">
                                       <span style="font-size: 14px;float: right;padding-right: 25px;">番号：{{$army->stitle}} </span>
                                       <br><br>
                                       <span style="padding-right: 25px;font-size: 25px">{{$army->second}} </span>
                                   </div>
                                </a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
