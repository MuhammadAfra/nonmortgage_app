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
        $sektorEkonomi = Master_Sektor_Ekonomi::orderBy('id', 'desc')->get();
        return view('master.sektor_ekonomi.index', compact('sektorEkonomi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.sektor_ekonomi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'Sandi_Turunan' => 'required',
            'Label' => 'required',
            'Sandi_Utama' => 'required',
            'Label_Utama' => 'required',
        ],[
            'Sandi_Turunan' => 'Input Sandi Turunan!',
            'Label' => 'Input Label Turunan!',
            'Sandi_Utama' => 'Input Sandi Utama!',
            'Label_Utama' => 'Input Label Utama!',
        ]);

        Master_Sektor_Ekonomi::create([
            'Sandi_Turunan' => $request->Sandi_Turunan,
            'Label' => $request->Label,
            'Sandi_Utama' => $request->Sandi_Utama,
            'Label_Utama' => $request->Label_Utama,
        ]);

        return redirect('master_sektor_ekonomi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Master_Sektor_Ekonomi  $master_Sektor_Ekonomi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sektorEkonomi = Master_Sektor_Ekonomi::findorfail($id);
        return view('master.sektor_ekonomi.detail', compact('sektorEkonomi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Master_Sektor_Ekonomi  $master_Sektor_Ekonomi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sektorEkonomi = Master_Sektor_Ekonomi::findorfail($id);
        return view('master.sektor_ekonomi.edit', compact('sektorEkonomi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Master_Sektor_Ekonomi  $master_Sektor_Ekonomi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'Sandi_Turunan' => 'required',
            'Label' => 'required',
            'Sandi_Utama' => 'required',
            'Label_Utama' => 'required',
        ],[
            'Sandi_Turunan' => 'Input Sandi Turunan!',
            'Label' => 'Input Label Turunan!',
            'Sandi_Utama' => 'Input Sandi Utama!',
            'Label_Utama' => 'Input Label Utama!',
        ]);

        $sektorEkonomi = Master_Sektor_Ekonomi::findorfail($id);
        $sektorEkonomi->update([
            'Sandi_Turunan' => $request->Sandi_Turunan,
            'Label' => $request->Label,
            'Sandi_Utama' => $request->Sandi_Utama,
            'Label_Utama' => $request->Label_Utama,
        ]);

        return redirect('master_sektor_ekonomi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Master_Sektor_Ekonomi  $master_Sektor_Ekonomi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sektorEkonomi = Master_Sektor_Ekonomi::findorfail($id);
        $sektorEkonomi->delete();

        return redirect('master_sektor_ekonomi');
    }
}
