<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Departement;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class GestionDepartementController extends Controller
{
    public function index(){
        $departements=Departement::latest()->orderBy('code')->paginate(10);
        return view('admin.gestionDepartement.index',[
            'departements'=>$departements,
            'n'=>1
        ]);
    }
    public function show(Request $request){
        if(!isset($request->search)){
            $departement=Departement::all();
        }else{
            $departement=DB::table('departements')
                            ->where('intitule', 'like', '%'.$request->search.'%')
                            ->orderBy('code')
                            ->get();
        }
        return response()->json($departement);
    }
    public function create(){
        return view('admin.gestionDepartement.create');
    }
    public function store(Request $request){
        $request->validate([
            'code'=>['required', 'max:25', 'min:3', 'unique:departements'],
            'intitule'=>['required', 'max:50']
        ]);
        $data=$request->except('_token', '_method', 'submit');
        Departement::create($data);
        return redirect()->route('Admin.departement.index');
    }
    public function edit(Request $request){
        $departement=Departement::findOrFail($request->id);
        return response()->json($departement);
    }

    public function update(Request $request){
        Departement::where('id', $request->id)
                    ->update([
                        'code'=>$request->code,
                        'intitule'=>$request->intitule
                    ]);
        $departement=Departement::findOrFail($request->id);
        return response()->json($departement);
    }
    public function destroy($id){
        $departement=Departement::findOrFail($id);
        $departement->delete();
        return back();
    }
}
