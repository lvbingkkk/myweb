<?php

namespace App\Http\Controllers;

use App\Five;
use Illuminate\Http\Request;

class FiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Five  $five
     * @return \Illuminate\Http\Response
     */
    public function show(Five $num)
    {
        return  view('army.five',['army'=>$num]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Five  $five
     * @return \Illuminate\Http\Response
     */
    public function edit(Five $five)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Five  $five
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Five $five)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Five  $five
     * @return \Illuminate\Http\Response
     */
    public function destroy(Five $five)
    {
        //
    }
}
