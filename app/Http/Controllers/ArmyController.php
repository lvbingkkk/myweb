<?php

namespace App\Http\Controllers;

use App\Army;
use Illuminate\Http\Request;

class ArmyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $data = Army::all();
//        dd($data);


        return view('army.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Army  $army
     * @return \Illuminate\Http\Response
     */
    public function show(Army $num)
    {
//dd($num);
        return view("army.two",['army'=>$num]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Army  $army
     * @return \Illuminate\Http\Response
     */
    public function edit(Army $army)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Army  $army
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Army $army)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Army  $army
     * @return \Illuminate\Http\Response
     */
    public function destroy(Army $army)
    {
        //
    }
}
