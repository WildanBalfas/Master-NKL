<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\audit;
use App\client;
use Auth;

class auditController extends Controller
{
    function inputAudit()
    {
        $client = client::select('kodeAu', 'id', 'namaAu', 'provinsi')->get();
        return view('contents.inputAudit', compact('client'));
    }

     function viewAudit()
    {   
        
        $audit = audit::all();
        //dd($audit);
        return view('contents.viewAudit')
        ->with('audit',$audit);
    }

    function insertAudit(Request $request)
    {   
        $audit = new audit;
        $file_rencana = $request->file('rencana');
        
        if(!empty($file_rencana)) {
            $file_rencana_name = $file_rencana->getClientOriginalName();
            $file_rencana->move(public_path('uploads/rencana/'), $file_rencana_name);
            $audit->rencana = 'uploads/rencana/'.$file_rencana_name;
        }

        $request_id = Auth::user()->id;

            $audit->kodeAu = $request->kodeAu;
            $audit->namaAu = $request->namaAu;
            $audit->provinsi = $request->provinsi;
            $audit->jenisAu = $request->jenisAu;
            $audit->tglMul = $request->tglMul;
            $audit->tglSel = $request->tglSel;
            $audit->hasil = '';
            $audit->progress = $request->progress;
            $audit->user_id = $request_id;
            // dd($audit);
        $audit->save();

        return redirect('/view-audit');
    }

    function updateAudit(Request $request, $id)
    {
        $file_hasil = $request->file('hasil');
        $file_hasil_name = $file_hasil->getClientOriginalName();
        $file_hasil->move(public_path('uploads/hasil/'),$file_hasil_name);

        $audit = audit::find($id);
            $audit->kodeAu = $request->kodeAu;
            $audit->namaAu = $request->namaAu;
            $audit->provinsi = $request->provinsi;
            $audit->jenisAu = $request->jenisAu;
            $audit->tglMul = $request->tglMul;
            $audit->tglSel = $request->tglSel;
            $audit->rencana = $audit->rencana;
            $audit->hasil = 'uploads/hasil/'.$file_hasil_name;
            $audit->progress = $request->progress;
        $audit->save();

        return redirect('/view-audit');
    }

    function editAudit($id)
    {
        $audit = audit::where('id','=',$id)->first();

        return view('contents.editAudit')
        ->with('audit_data',$audit);
    }

    function deleteAudit($id)
    {
        $audit = audit::find($id);
        $audit->delete();

        return redirect('/view-audit');
    }

    public function ajaxAudit($id) {
        $client = client::where('kodeAu', $id)->first();
        return response()->json($client);
    }
}
