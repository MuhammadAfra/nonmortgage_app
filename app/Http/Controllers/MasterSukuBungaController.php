<?php

namespace App\Http\Controllers;

use App\Models\Master_Suku_Bunga;
use Illuminate\Http\Request;

class MasterSukuBungaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sukuBunga = Master_Suku_Bunga::all();
        return view('master.suku_bunga.index', compact('sukuBunga'));
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
     * @param  \App\Models\Master_Suku_Bunga  $master_Suku_Bunga
     * @return \Illuminate\Http\Response
     */
    public function show(Master_Suku_Bunga $master_Suku_Bunga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Master_Suku_Bunga  $master_Suku_Bunga
     * @return \Illuminate\Http\Response
     */
    public function edit(Master_Suku_Bunga $master_Suku_Bunga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Master_Suku_Bunga  $master_Suku_Bunga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Master_Suku_Bunga $master_Suku_Bunga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Master_Suku_Bunga  $master_Suku_Bunga
     * @return \Illuminate\Http\Response
     */
    public function destroy(Master_Suku_Bunga $master_Suku_Bunga)
    {
        //
    }
}
