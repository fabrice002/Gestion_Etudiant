<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Niveau;
use Illuminate\Http\Request;
use App\Models\Admin\Filiere;
use App\Models\Etudiant\Etudiant;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etudiant_nombre=Etudiant::all()->count();
        $niveaux=Niveau::select('id','code')->orderBy('code')->get();
        $filieres=Filiere::select('id', 'code')->orderBy('code')->get();
        if($filieres->count()>0){
            foreach($filieres as $filiere){
                $datas[$filiere->code]=Etudiant::where('filiere_id', $filiere->id)->get()->count();
            }
        }else{
            $datas['Aucune']=0;
        }
        if($niveaux->count()>0){
            foreach($niveaux as $niveau){
                $data[$niveau->code]=Etudiant::where('niveau_id', $niveau->id)->get()->count();
            }
        }
        else{
            $data['Aucun']=0;
        }


        return view('admin.index',[
            'etudiant_nombre'=>$etudiant_nombre,
            'datas'=>$data,
            'datas_filiere'=>$datas
        ]);
    }
    public function indexDept($id){

        return view('admin.indexDepartement',[
            'id'=>$id,
        ]);
    }
    public function indexFil($id){
        return view('admin.indexFiliere',[
            'id'=>$id
        ]);
    }
    public function indexNiv($id){
        return view('admin.indexNiveau',[
            'id'=>$id
        ]);
    }
    public function indexUE($id){
        return view('admin.indexUE',[
            'id'=>$id
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
