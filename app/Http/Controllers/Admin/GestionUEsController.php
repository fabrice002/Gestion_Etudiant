<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Ue;
use App\Models\Admin\Niveau;
use Illuminate\Http\Request;
use App\Models\Admin\Filiere;
use App\Http\Controllers\Controller;

class GestionUEsController extends Controller
{
    public function index(){
        $filieres=Filiere::select('id', 'intitule')->orderBy('intitule')->get();
        $niveaux=Niveau::select('id', 'intitule')->orderBy('intitule')->get();
        $ues=Ue::latest()->orderBy('code')->paginate(10);
        return view('admin.gestionUEs.index',[
            'filieres'=>$filieres,
            'niveaux'=>$niveaux,
            'ues'=>$ues,
            'n'=>1
        ]);
    }
    public function showFil($id){
        $filieres=Filiere::select('id', 'intitule')->orderBy('intitule')->get();
        $niveaux=Niveau::select('id', 'intitule')->orderBy('intitule')->get();
        $ues=Ue::where('filiere_id', $id)
                    ->orderBy('code')
                    ->paginate(10);
            return view('admin.gestionUEs.index',[
                        'filieres'=>$filieres,
                        'niveaux'=>$niveaux,
                        'ues'=>$ues,
                        'n'=>1,
                        'filiere_id'=>$id,

                    ]);

    }
    public function showNiv($id){
        $filieres=Filiere::select('id', 'intitule')->orderBy('intitule')->get();
        $niveaux=Niveau::select('id', 'intitule')->orderBy('intitule')->get();
        $ues=Ue::where('niveau_id', $id)
                    ->orderBy('code')
                    ->paginate(10);
            return view('admin.gestionUEs.index',[
                        'filieres'=>$filieres,
                        'niveaux'=>$niveaux,
                        'ues'=>$ues,
                        'n'=>1,
                        'niveau_id'=>$id

                    ]);
    }
    public function show(Request $request){

        $filieres=Filiere::select('id', 'intitule')->orderBy('intitule')->get();
        $niveaux=Niveau::select('id', 'intitule')->orderBy('intitule')->get();
        if($request->filiere_id !=null && $request->niveau_id !=null){
            $ues=Ue::where('filiere_id', $request->filiere_id)
                    ->where('niveau_id', $request->niveau_id)
                    ->orderBy('code')
                    ->paginate(10);
            return view('admin.gestionUEs.index',[
                        'filieres'=>$filieres,
                        'niveaux'=>$niveaux,
                        'ues'=>$ues,
                        'n'=>1,
                        'filiere_id'=>$request->filiere_id,
                        'niveau_id'=>$request->niveau_id

                    ]);
        }elseif($request->filiere_id !=null && $request->niveau_id ==null){
            $ues=Ue::where('filiere_id', $request->filiere_id)
                    ->orderBy('code')
                    ->paginate(10);
            return view('admin.gestionUEs.index',[
                        'filieres'=>$filieres,
                        'niveaux'=>$niveaux,
                        'ues'=>$ues,
                        'n'=>1,
                        'filiere_id'=>$request->filiere_id,

                    ]);
        }elseif($request->filiere_id ==null && $request->niveau_id !=null){
            $ues=Ue::where('niveau_id', $request->niveau_id)->orderBy('code')
                    ->paginate(10);
            return view('admin.gestionUEs.index',[
                        'filieres'=>$filieres,
                        'niveaux'=>$niveaux,
                        'ues'=>$ues,
                        'n'=>1,
                        'niveau_id'=>$request->niveau_id

                    ]);
        }else{
            return redirect()->route('Admin.ue.index');
        }

    }
    public function create($id){
        $filiere_id=$id;
        $filieres=Filiere::select('id', 'intitule')->orderBy('intitule')->get();
        $niveaux=Niveau::select('id', 'intitule')->orderBy('intitule')->get();
        return view('admin.gestionUEs.create',[
            'filiere_id'=>$filiere_id,
            'filieres'=>$filieres,
            'niveaux'=>$niveaux
        ]);
    }
    public function createNiv($id){
        $niveau_id=$id;
        $filieres=Filiere::select('id', 'intitule')->orderBy('intitule')->get();
        $niveaux=Niveau::select('id', 'intitule')->orderBy('intitule')->get();
        return view('admin.gestionUEs.create',[
            'niveau_id'=>$niveau_id,
            'filieres'=>$filieres,
            'niveaux'=>$niveaux
        ]);
    }
    public function store(Request $request){
        $request->validate([
            'code'=>['required', 'max:25', 'min:3', 'unique:ues'],
            'filiere_id'=>['required', 'integer'],
            'intitule'=>['required', 'max:100'],
            'niveau_id'=>['required', 'integer']
        ]);
        $data=$request->except('_token', '_method', 'submit');
        Ue::create($data);
        return redirect()->route('Admin.ue.index');
    }
    public function edit(Request $request){
        $ue=Ue::findOrFail($request->id);
        return response()->json($ue);
    }
    public function update(Request $request){
        Ue::where('id', $request->id)
            ->update([
                'code'=>$request->code,
                'intitule'=>$request->intitule
            ]);
        $ue=Ue::findOrFail($request->id);
        return response()->json($ue);
    }
    public function destroy($id){
        $ue=Ue::findOrFail($id);
        $ue->delete();
        return back();
    }
}
