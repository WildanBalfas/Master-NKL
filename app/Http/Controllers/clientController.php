<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\client;
use DB;

class clientController extends Controller
{
    function inputClient()
    {
      $kabupaten = DB::table('kode_kabupaten')->get();
      $provinsi = DB::table('kode_provinsi')->get();
      $user = DB::table('users')
      ->where('role', 'client')
      ->get();
      $data = [
          'kabupaten' => $kabupaten,
          'provinsi' => $provinsi,
          'users' => $user
      ];

        return view('contents.inputClient', $data);
    }

    function viewClient()
    {
        $client = client::all();

        return view('contents.viewClient')
        ->with('client',$client);
    }

    function insertClient(Request $request)

    {
        $client = new client;

        $file_surat = $request->file('surat');
        
        if(!empty($file_surat)) {
            $file_surat_name = $file_surat->getClientOriginalName();
            $file_surat->move(public_path('uploads/surat/'), $file_surat_name);
            $client->surat = 'uploads/surat/'.$file_surat_name;
        }

            $client->tipeClient = $request->tipeClient;
            $client->kodeAu = $request->kodeAu;
            $client->namaAu = $request->namaAu;
            $client->provinsi = $request->provinsi;
            $client->lingkup = $request->lingkup;
            $client->noSer = $request->noSer;
            $client->sdSer = $request->sdSer;
            $client->edSer = $request->edSer;
            $client->durasi = $request->durasi;
            $client->progress = $request->progress;
            $client->status = $request->status;
            $client->npwp = $request->npwp;
            $client->user_id = $request->user_id;
            $client->namaEks = $request->namaAu;
            $client->alamatEks = $request->alamatEks;
            $client->kodeProv = $request->kodeProv;
            $client->kodeKab = $request->kodeKab;
            $client->etpik = $request->etpik;
            $client->skema = $request->skema;
            $client->kodePen = $request->kodePen;
            $client->tempat = $request->tempat;
            $client->slk = $request->noSer;

            //dd($file_surat);
        $client->save();

        return redirect('/view-client')->with('Sukses','Data Berhasil di Input');
    }

    function updateClient(Request $request, $id)
    {
        $client = client::find($id);
            $client->tipeClient = $request->tipeClient;
            $client->kodeAu = $request->kodeAu;
            $client->namaAu = $request->namaAu;
            $client->provinsi = $request->provinsi;
            $client->lingkup = $request->lingkup;
            $client->noSer = $request->noSer;
            $client->sdSer = $request->sdSer;
            $client->edSer = $request->edSer;
            $client->durasi = $request->durasi;
            $client->user_id = $request->user_id;
            $client->progress = $request->progress;
            $client->status = $request->status;
            $client->npwp = $request->npwp;
            $client->namaEks = $request->namaAu;
            $client->alamatEks = $request->alamatEks;
            $client->kodeProv = $request->kodeProv;
            $client->kodeKab = $request->kodeKab;
            $client->etpik = $request->etpik;
            $client->skema = $request->skema;
            $client->kodePen = $request->kodePen;
            $client->tempat = $request->tempat;
            $client->slk = $request->noSer;
        $client->save();

        return redirect('/view-client');
    }

    function editClient($id)
    {
        $client = client::where('id','=',$id)->first();
        $kabupaten = DB::table('kode_kabupaten')->get();
        $provinsi = DB::table('kode_provinsi')->get();
        $user = DB::table('users')
      ->where('role', 'client')
      ->get();

        $data = [
            'kabupaten' => $kabupaten,
            'provinsi' => $provinsi,
            'client_data' => $client,
            'users' => $user
        ];

        return view('contents.editClient', $data);
    }

    function deleteClient($id)
    {
        $client = client::find($id);
        $client->delete();

        return redirect('/view-client');
    }
}
