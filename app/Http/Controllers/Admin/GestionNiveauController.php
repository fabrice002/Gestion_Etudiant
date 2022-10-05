<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Niveau;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class GestionNiveauController extends Controller
{
    public function index(){
        $niveaux=Niveau::latest()->paginate(10);
        // dd($niveaux);

        return view('admin.gestionNiveau.index',[
            'niveaux'=>$niveaux,
            'n'=>1
        ]);

    }
    public function show(Request $request){
        if(!isset($request->search)){
            $niveaux=Niveau::all();
        }else{
            $niveaux=DB::table('niveaux')->OrderBy('code')
                            ->where('intitule', 'like', $request->search.'%')
                            ->get();
        }
        return response()->json($niveaux);


    }
    public function create(){
        return view('admin.gestionNiveau.create');
    }
    public function store(Request $request){
        $request->validate([
            'code'=>['required', 'max:25', 'min:2', 'unique:niveaux'],
            'intitule'=>['required', 'max:50']
        ]);
        $data=$request->except('_token', '_method', 'submit');
        Niveau::create($data);
        return redirect()->route('Admin.niveau.index');
    }
    public function edit(Request $request){
        $niveau=Niveau::findOrFail($request->id);
        return response()->json($niveau);
    }
    public function update(Request $request){
        $data=$request->except('_token', '_method', 'submit');
        Niveau::where('id', $request->id)
                ->update($data);
        $niveau=Niveau::find($request->id);
        return response()->json($niveau);

    }
    public function destroy($id){
        $niveau=Niveau::find($id);
        $niveau->delete();
        return back();
    }
}
