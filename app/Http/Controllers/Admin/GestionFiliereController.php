<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Filiere;
use App\Models\Admin\Departement;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class GestionFiliereController extends Controller
{
    public function index(){
        $filieres=Filiere::latest()->orderBy('code')->paginate(10);
        $departements=Departement::select('id', 'intitule')->orderBy('code')->get();
        return view('admin.gestionFiliere.index',[
            'filieres'=>$filieres,
            'departements'=>$departements,
            'n'=>1
        ]);

    }
    public function showFil(Request $request){
        if(!isset($request->search)){
            $filieres=Filiere::all();
        }else{
            $filieres=DB::table('filieres')
                            ->where('intitule', 'like', '%'.$request->search.'%')
                            ->orderBy('code')
                            ->get();
        }
        $departements=Departement::select('id', 'code')->get();
        return response()->json([
            'filiere'=>$filieres,
            'departement'=>$departements
        ]);
    }
    public function show(Request $request){
        $id=$request->departement_id;
        if($id !=null){
            $filieres=Filiere::where('departement_id', $id)->orderBy('code')->paginate(10);
            $departements=Departement::select('id', 'intitule')->orderBy('code')->get();
            return view('admin.gestionFiliere.index',[
                'filieres'=>$filieres,
                'departements'=>$departements,
                'n'=>1,
                'id'=>$id
            ]);
        }else{
            return redirect()->route('Admin.filiere.index');
        }

    }
    // Pour le controller qui vient de la vue admin.indexDept
    public function showDept($id){
        $filieres=Filiere::where('departement_id', $id)->orderBy('code')->paginate(10);
            $departements=Departement::select('id', 'intitule')->orderBy('code')->get();
            return view('admin.gestionFiliere.index',[
                'filieres'=>$filieres,
                'departements'=>$departements,
                'n'=>1,
                'id'=>$id
            ]);
    }
    public function create($id){
        $departements=Departement::select('id', 'intitule')->orderBy('code')->get();
        return view('admin.gestionFiliere.create',[
            'id'=>$id,
            'departements'=>$departements

        ]);
    }
    public function createFil(){
        $departements=Departement::select('id', 'intitule')->orderBy('code')->get();
        return view('admin.gestionFiliere.create',[
            'departements'=>$departements,
        ]);
    }
    public function store(Request $request){
        $request->validate([
            'code'=>['required', 'max:25', 'min:3', 'unique:filieres'],
            'intitule'=>['required', 'max:50']
        ]);
        $data=$request->except('_token', '_method', 'submit');
        Filiere::create($data);
        return redirect()->route('Admin.filiere.index');
    }
    public function edit(Request $request){
        $filiere=Filiere::findOrFail($request->id);
        return response()->json($filiere);
    }
    public function update(Request $request){
        Filiere::where('id', $request->id)
                    ->update([
                        'code'=>$request->code,
                        'intitule'=>$request->intitule
                    ]);
        $filiere=Filiere::findOrFail($request->id);
        return response()->json($filiere);
    }
    public function destroy($id){
        $filiere=Filiere::find($id);
        $filiere->delete();
        return back();
    }
}
