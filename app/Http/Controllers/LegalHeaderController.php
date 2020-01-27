<?php

namespace App\Http\Controllers;
//controller
use App\LegalHeader;
use App\LegalDetail;
use App\client;
use Illuminate\Http\Request;
use App\LegalExport;
use Excel;
use Auth;
use DB;
use Carbon\Carbon;

class LegalHeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_role = Auth::user()->role;
        if ($user_role == 'Admin' || $user_role == 'admin'){
            $lh = LegalHeader::all();
        } else {
            $lh = LegalHeader::all();
        }

        return view('contents.vlegal.list', compact('lh'));
    }

    public function ajaxAudit($id) {
       $client = client::where('kodeAu', $id)->first();
       $kabupaten = DB::table('kode_kabupaten')->where('kodeKab', $client['kodeKab'])->first();
       // dd($kabupaten);
       $provinsi = DB::table('kode_provinsi')->where('kodeProvinsi', $client['kodeProv'])->first();
       $client['kodeKab'] = $kabupaten->kodeKab.' - '.$kabupaten->nameKab;
       $client['kodeProv'] = $provinsi->kodeProvinsi.' - '.$provinsi->nameProvinsi;
       return response()->json($client);
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$todayDate = Carbon::now();
        $user = Auth::user();
        $role = $user->role;
        $id = $user->id;
        if($role == 'clinet')
        {
            $klien = \App\client::where('user_id', $id)->first();
        } else {
            $klien - '';
        }

        $client = \App\client::select('kodeAu')->get();
        // $kabupaten = DB::table('kode_kabupaten')->get();
        $pel_bongkar = DB::table('kode_pelabuhan_bongkar')->get();
        $pel_muat = DB::table('kode_pelabuhan_muat')->get();
        // $provinsi = DB::table('kode_provinsi')->get();
        $negara = DB::table('kode_negara')->get();
        
        //$request_id = Auth::user()->id;
        $data = [
            //'user_id' => $request_id,
            'klien' => $klien,
            'client' => $client,
            'negara' => $negara,
            // 'kabupaten' => $kabupaten,
            'pel_bongkar' => $pel_bongkar,
            'pel_muat' => $pel_muat,
            // 'provinsi' => $provins
        ];
        return view('contents.vlegal.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request_id = Auth::user()->id;
        //ambil id terakhir
        $id = LegalHeader::select('id')->orderBy('created_at', 'desc')->get();
        $con = count($id)+1;
        $id = strval($con);
        $nol = 3 - strlen($id);
        $z = '';
        for($i=0;$i<$nol;$i++)
        {
            $z=$z.'0';
        }
        $id_vlegal=$z.$id;
        
        $data = $request->all(); 

        $file_lampiran = $request->file('lampiran');


        $data['no_vlegal'] = $id_vlegal;
        $data['client_id'] = $data['kodeAu'];
        if(!empty($data)){
            $head = new LegalHeader($data);
            $head->user_id = $request_id;

            if(!empty($file_lampiran)) {
                $file_lampiran_name = $file_lampiran->getClientOriginalName();
                $file_lampiran->move(public_path('uploads/lampiran/'), $file_lampiran_name);
                $head->lampiran = 'uploads/lampiran/'.$file_lampiran_name;
            };
            $head->save();
            return redirect()->route('v-legal-detail.buat', $head->id);
        };

        return redirect()->back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LegalHeader  $legalHeader
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = LegalHeader::findOrFail($id);

        return view('contents.vlegal.show', compact($data));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LegalHeader  $legalHeader
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = LegalHeader::findOrFail($id);
        $data['tgl_ttd'] = \Carbon\Carbon::parse($data['tgl_ttd'])->format('Y-m-d');
        $data['tgl_invoice'] = \Carbon\Carbon::parse($data['tgl_invoice'])->format('Y-m-d');
        $client = \App\client::select('kodeAu')->get();
        // $kabupaten = DB::table('kode_kabupaten')->get();
        $pel_bongkar = DB::table('kode_pelabuhan_bongkar')->get();
        $pel_muat = DB::table('kode_pelabuhan_muat')->get();
        // $provinsi = DB::table('kode_provinsi')->get();
        $negara = DB::table('kode_negara')->get();

        $datas = [
            'client'=> $client,
            'data' => $data,
            'negara' => $negara,
            // 'kabupaten' => $kabupaten,
            'pel_bongkar' => $pel_bongkar,
            'pel_muat' => $pel_muat,
            // 'provinsi' => $provinsi
        ];
        // dd($data);
        return view('contents.vlegal.edit', $datas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LegalHeader  $legalHeader
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $form = $request->except('_token');
        if(!empty($form)){
            $data = LegalHeader::whereId($id)->update($form);
            return redirect()->route('v-legal-detail.buat', $id);
        }

        return redirect()->back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LegalHeader  $legalHeader
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = LegalHeader::find($id);
        if(!empty($data)){
            $data->delete();
            $detail = LegalDetail::select('id')->where('id_header', $id);

            if(!empty($detail))
            {
                $detail->delete();
            }
            return redirect()->back()->withSuccess(['msg'=>'berhasil menghapus data']);

        }

        return redirect()->back()->withErrors(['msg'=>'gagal menghapus data']);
    }

    public function excel($id)
    {
        $nama = LegalHeader::select('nama_eksportir', 'no_vlegal')->where('id', $id)->first();
        $e = $nama->nama_eksportir;
        $n = $nama->no_vlegal;
        // return view('contents.exports.vlegalexport', $data);
        return Excel::download(new LegalExport($id), $e.'_'.$n.'.xls');
        // return (new LegalExport)->forId($id)->download('Detail.xlsx');

    }

    public function kirim(Request $request, $id)
    {
        $data = LegalHeader::find($id);
        if($data) {
            $data->status = "TERKIRIM";
            $data->save();
            return redirect()->back()->withSuccess(['msg'=>'berhasil mengirim data']);
        }

        return redirect()->back()->withErrors(['msg'=>'gagal mengirim data, data tidak ditemukan']);

    }
}
