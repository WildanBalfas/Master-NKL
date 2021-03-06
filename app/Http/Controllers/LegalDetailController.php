<?php

namespace App\Http\Controllers;

use App\LegalDetail;
use Illuminate\Http\Request;
use DB;

class LegalDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_header)
    {
        $header = LegalDetail::where('id_header', $id_header)->get();

        return response()->json($header);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data = [
            'id' => $id,
            'detail' => LegalDetail::where('id_header', $id)->get(),
            'mata_uang' => DB::table('kode_currency')->get(),
            'hs' => DB::table('kode_hs')->get(),
            // 'hs' => '',
            'ilmiah' => DB::table('nama_ilmiah')->get(),
            'negara' => DB::table('kode_negara')->get()
        ];
        return view('contents.vlegal.addDetail', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['scientific_name'] = implode(";", $data['scientific_name']);
        // dd($data['scientific_name']);
        if(!empty($data)) {
            $insert = new LegalDetail($data);
            $insert->save();

            return redirect()->back();
            // return response()->json(['success' => true, 'data' => $insert]);
        }

        return response()->json(['success' => false, 'msg' => 'Data kosong']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LegalDetail  $legalDetail
     * @return \Illuminate\Http\Response
     */
    public function show(LegalDetail $legalDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LegalDetail  $legalDetail
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = LegalDetail::find($id);
        $data['scientific_name'] = explode(";", $data['scientific_name']);
        // dd($data);
        // in_array(needle, haystack)
        $datas = [
            'data' => $data,
            'mata_uang' => DB::table('kode_currency')->get(),
            'hs' => DB::table('kode_hs')->get(),
            'ilmiah' => DB::table('nama_ilmiah')->get(),
            'negara' => DB::table('kode_negara')->get()
        ];
        return view('contents.vlegal.editDetail', $datas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LegalDetail  $legalDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $form = $request->except('_token','_method');
        $form['scientific_name'] = implode(";", $form['scientific_name']);
        if(!empty($form)){
            $data = LegalDetail::whereId($id)->update($form);
            $id_header = $form['id_header'];
            return redirect()->route('v-legal-detail.buat', $id_header);
        }
        return redirect()->back()->withErrors(['msg' => 'Gagal merubah data']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LegalDetail  $legalDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = LegalDetail::find($id);
        if(!empty($data)){
            $data->delete();
            return redirect()->back();
        }

        return redirect()->back()->withErrors(['msg'=>'gagal menghapus data']);
    }
}
