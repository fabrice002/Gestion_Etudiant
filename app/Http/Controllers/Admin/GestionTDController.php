<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Td;
use App\Models\Admin\Ue;
use Illuminate\Http\Request;
use App\Models\Admin\TdSpecial;
use App\Http\Controllers\Controller;

class GestionTDController extends Controller
{
    public function index(){
        $tds=Td::all();
        $tdSpecials=TdSpecial::all();
        $ues=Ue::all();
        // dd('ok');
        return view('admin.gestionGroupTD.index',[
            'tds'=>$tds,
            'tdSpecials'=>$tdSpecials,
            'n'=>1,
            'ues'=>$ues
        ]);
    }
    public function show(Request $request){
        $ues=Ue::all();
        $data=$request->except('_mthod', '_token', 'submit');
        if($request->ue_id!=null && $request->Td_id !=null){
            $ue_id=$request->ue_id;
            $td_id=$request->Td_id;
            if($request->Td_id==1){
                $tds=Td::where('ue_id', $request->ue_id)->Orderby('code')->get();
                return view('admin.gestionGroupTD.index',[
                    'tds'=>$tds,
                    'ue_id'=>$ue_id,
                    'td_id'=>$td_id,
                    'n'=>1,
                    'ues'=>$ues
                ]);
            }else{
                $ue_tdSpecial_id=$ue_id;
                $tdSpecials=TdSpecial::where('ue_id', $request->ue_id)->Orderby('code')->get();
                return view('admin.gestionGroupTD.index',[
                    'tdSpecials'=>$tdSpecials,
                    'ue_id'=>$ue_id,
                    'td_id'=>$td_id,
                    'n'=>1,
                    'ues'=>$ues,
                    'ue_tdSpecial_id'=>$ue_tdSpecial_id
                ]);
            }
        }elseif($request->ue_id==null && $request->Td_id !=null){
            $td_id=$request->Td_id;
            if($request->Td_id==1){
                $tds=Td::all();
                return view('admin.gestionGroupTD.index',[
                    'tds'=>$tds,
                    'td_id'=>$td_id,
                    'n'=>1,
                    'ues'=>$ues
                ]);
            }else{
                $tdSpecials=TdSpecial::all();
                return view('admin.gestionGroupTD.index',[
                    'tdSpecials'=>$tdSpecials,
                    'td_id'=>$td_id,
                    'n'=>1,
                    'ues'=>$ues,

                ]);
            }
        }elseif($request->ue_id!=null && $request->Td_id ==null){
            $tds=Td::where('ue_id', $request->ue_id)->Orderby('code')->get();
            $tdSpecials=TdSpecial::where('ue_id', $request->ue_id)->Orderby('code')->get();
            $ues=Ue::all();
            $ue_id=$request->ue_id;
            return view('admin.gestionGroupTD.index',[
                'tds'=>$tds,
                'tdSpecials'=>$tdSpecials,
                'n'=>1,
                'ues'=>$ues,
                'ue_id'=>$ue_id
            ]);
        }else{
            return redirect()->route('Admin.groupeTD.index');
        }
    }
    public function showTd($id){
        $ues=Ue::all();
        $ue_id=$id;
        $td_id=1;
        $tds=Td::where('ue_id', $id)->Orderby('code')->get();
                return view('admin.gestionGroupTD.index',[
                    'tds'=>$tds,
                    'ue_id'=>$ue_id,
                    'td_id'=>$td_id,
                    'n'=>1,
                    'ues'=>$ues
                ]);
    }
    public function showTdSpecial($id){
        $ues=Ue::all();
        $ue_id=$id;
        $td_id=2;
        $tdSpecials=TdSpecial::where('ue_id', $id)->Orderby('code')->get();
                return view('admin.gestionGroupTD.index',[
                    'tdSpecials'=>$tdSpecials,
                    'td_id'=>$td_id,
                    'ue_id'=>$ue_id,
                    'n'=>1,
                    'ues'=>$ues,
                    'ue_tdSpecial_id'=>$id

                ]);

    }
    public function createTd($id){
        $ues=Ue::select('id', 'code')->OrderBy('code')->get();
        return view('admin.gestionGroupTD.create',[
            'ues'=>$ues,
            'ue_id'=>$id,
        ]);
    }
    public function createTdSpeciale($id){
        $ue_tdSpecial_id=$id;
        $ues=Ue::select('id', 'code')->OrderBy('code')->get();
        return view('admin.gestionGroupTD.create',[
            'ues'=>$ues,
            'ue_id'=>$id,
            'ue_tdSpecial_id'=>$ue_tdSpecial_id,
        ]);

    }
    public function store(Request $request){
        $request->validate([
            'ue_id'=>['required', 'integer'],
            'code'=>['required', 'max:25', 'min:3', 'unique:td_specials'],
            'intitule'=>['required', 'max:50'],
        ]);
        $data=$request->except('_token', '_method', 'submit');
        Td::create($data);
        return redirect()->route('Admin.groupeTD.showTd', $request->ue_id);
    }
    public function storeTdSpecial(Request $request){
        $request->validate([
            'ue_id'=>['required', 'integer'],
            'code'=>['required', 'max:25', 'min:3', 'unique:td_specials'],
            'intitule'=>['required', 'max:50'],
            'prix'=>['required', 'integer'],
        ]);
        $data=$request->except('_token', '_method', 'submit');
        TdSpecial::create($data);
        return redirect()->route('Admin.groupeTD.showTdSpecial', $request->ue_id);

    }
    public function edit(Request $request){
        $td=Td::findOrFail($request->id);
        return response()->json($td);
    }
    public function editTdSpecial(Request $request){
        $tdSpecials=TdSpecial::findOrFail($request->id);
        return response()->json($tdSpecials);
    }
    public function update(Request $request){
        Td::where('id', $request->id)
            ->update([
                'code'=>$request->code,
                'intitule'=>$request->intitule
            ]);
        $td=Td::findOrFail($request->id);
        return response()->json($td);
    }
    public function updateTdSpecial(Request $request){
        TdSpecial::where('id', $request->id)
            ->update([
                'code'=>$request->code,
                'intitule'=>$request->intitule,
                'prix'=>$request->prix
            ]);
            $tdSpecials=TdSpecial::findOrFail($request->id);
            return response()->json($tdSpecials);
    }
    public function destroy($id){
        $td=Td::findOrFail($id);
        $td->delete();
        return back();
    }
    public function destroyTdSpecial($id){
        $td=TdSpecial::findOrFail($id);
        $td->delete();
        return back();
    }
}
