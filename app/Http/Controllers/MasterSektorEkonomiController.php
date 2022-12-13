<?php

namespace App\Http\Controllers;

use App\Models\Master_Sektor_Ekonomi;
use Illuminate\Http\Request;

class MasterSektorEkonomiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sektorEkonomi = Master_Sektor_Ekonomi::all();
        return view('master.sektor_ekonomi.index', compact('sektorEkonomi'));
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
     * @param  \App\Models\Master_Sektor_Ekonomi  $master_Sektor_Ekonomi
     * @return \Illuminate\Http\Response
     */
    public function show(Master_Sektor_Ekonomi $master_Sektor_Ekonomi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Master_Sektor_Ekonomi  $master_Sektor_Ekonomi
     * @return \Illuminate\Http\Response
     */
    public function edit(Master_Sektor_Ekonomi $master_Sektor_Ekonomi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Master_Sektor_Ekonomi  $master_Sektor_Ekonomi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Master_Sektor_Ekonomi $master_Sektor_Ekonomi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Master_Sektor_Ekonomi  $master_Sektor_Ekonomi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Master_Sektor_Ekonomi $master_Sektor_Ekonomi)
    {
        //
    }
}
