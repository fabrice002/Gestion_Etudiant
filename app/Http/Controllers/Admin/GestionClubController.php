<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Club;
use Illuminate\Http\Request;
use App\Models\Admin\Departement;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class GestionClubController extends Controller
{
    public function index(){
        $clubs=Club::latest()->orderBy('code')->paginate(10);
        $departements=Departement::select('id', 'intitule')->orderBy('code')->get();
        return view("admin.gestionClub.index",[
            'clubs'=>$clubs,
            'departements'=>$departements,
            'n'=>1
        ]);
    }
    public function showC(Request $request){
        if(!isset($request->search)){
            $clubs=Club::all();
        }else{
            $clubs=DB::table('clubs')
                            ->where('intitule', 'like', '%'.$request->search.'%')
                            ->get();
        }
        $departements=Departement::select('id', 'code')->orderBy('code')->get();
        return response()->json([
            'club'=>$clubs,
            'departement'=>$departements
        ]);
    }
    public function show(Request $request){
        $id=$request->departement_id;
        if($id !=null){
            $clubs=Club::where('departement_id', $id)->orderBy('code')->paginate(10);
            $departements=Departement::select('id', 'intitule')->orderBy('code')->get();
            return view('admin.gestionClub.index',[
                'clubs'=>$clubs,
                'departements'=>$departements,
                'n'=>1,
                'id'=>$id
            ]);
        }else{
            return redirect()->route('Admin.club.index');
        }
    }
    // Pour le controller qui vient de la vue admin.indexDept
    public function showDept($id){
            $clubs=Club::where('departement_id', $id)->orderBy('code')->paginate(10);
            $departements=Departement::select('id', 'intitule')->orderBy('code')->get();
            return view('admin.gestionClub.index',[
                'clubs'=>$clubs,
                'departements'=>$departements,
                'n'=>1,
                'id'=>$id
            ]);
    }
    public function create($id){
        return view('admin.gestionClub.create',[
            'id'=>$id
        ]);
    }
    public function store(Request $request){
        $request->validate([
            'code'=>['required', 'max:25', 'min:3', 'unique:clubs'],
            'intitule'=>['required', 'max:50']
        ]);
        $data=$request->except('_token', '_method', 'submit');
        Club::create($data);
        return redirect()->route('Admin.club.index');
    }
    public function edit(Request $request){
        $club=Club::findOrFail($request->id);
        return response()->json($club);
    }
    public function update(Request $request){
        Club::where('id', $request->id)
                    ->update([
                        'code'=>$request->code,
                        'intitule'=>$request->intitule
                    ]);
        $club=Club::findOrFail($request->id);
        return response()->json($club);
    }
    public function destroy($id){
        $club=Club::findOrFail($id);
        $club->delete();
        return redirect()->route('Admin.club.index');
    }
}
