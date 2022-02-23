@extends('army.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 "style="padding-top: 65px;text-align:center;border-style: solid;border-color: #ae1c17">
                <div style="font-size: 55px;color: #ae1c17">
                  军 长
                </div>
                <div class="col-md-4 "style="float:right;margin-top:35px;margin-bottom: 220px; padding:40px 25px 45px ;border:2px solid #ee9933;">
                    番号 ：王牌1军
                </div>
                <div style="clear:both;"></div>
                <div class="row" >
                            <div class="col-md-6">
                                <a href="/armies/11" style="color: #ffffff">
                                    <div style="background-color: #11a2a8;padding-top: 30px;padding-bottom: 62px;" class="btn btn-primary btn-lg btn-block">
                                        <span style="font-size: 14px;float: right;padding-right: 25px;">番号：1-1 师 </span>
                                        <br><br>
                                        <span style="padding-right: 25px;font-size: 25px">1  师长 </span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6" >
                                <a href="/armies/12" style="color: #ffffff">
                                   <div style="background-color: #11a2a8;padding-top: 30px;padding-bottom: 62px;" class="btn btn-primary btn-lg btn-block">
                                       <span style="font-size: 14px;float: right;padding-right: 25px;">番号：1-2 师 </span>
                                       <br><br>
                                       <span style="padding-right: 25px;font-size: 25px">2  师长 </span>
                                   </div>
                                </a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
