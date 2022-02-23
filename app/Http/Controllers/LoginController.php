<?php


namespace App\Http\Controllers;


use App\Teachers;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index()
    {
        $data = Teachers::all();
//        $data2 = compact('data');
//        dd($data2);
        return view('login', compact('data'));

    }


    public function login(){

        $data2 = DB::table('teachers')->find(2);
//        $data2 = array($data);
//        $data = Teachers::all();

//        dd($data);
//
//        for ($i=0;$i<) {
//        }

//        if (0=='') {
//            return '0为空';
//        }

        //数组合并问题,用加号'+'
        $data=[];
        if ($data2) {
            foreach ($data2 as $key => $value) {
                $data=$data+[$key=>$value];

            }
        }

//        dd($data2);

        return view('login',$data);
    }

}
