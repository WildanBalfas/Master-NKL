<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pelabuhan_muat;

class PelMuatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $muats = pelabuhan_muat::all();

        return view('contents.pelabuhan-muat.index', compact('muats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contents.pelabuhan-muat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kodePelMuat'=>'required',
            'namePelMuat'=>'required',
        ]);

        $muat = new pelabuhan_muat([
            'kodePelMuat' => $request->get('kodePelMuat'),
            'namePelMuat' => $request->get('namePelMuat')
        ]);
        $muat->save();
        return redirect('/pelabuhan_muat')->with('success', 'pelabuhan muat saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $muat = pelabuhan_muat::find($id);
        return view('contents.pelabuhan-muat.edit', compact('muat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request->validate([
            'kodePelMuat'=>'required',
            'namePelMuat'=>'required'
        ]);

        $muat = pelabuhan_muat::find($id);
        $muat->kodePelMuat =  $request->get('kodePelMuat');
        $muat->namePelMuat = $request->get('namePelMuat');
        
        $muat->save();

        return redirect('/pelabuhan_muat')->with('success', 'Pelabuhan Muat updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
