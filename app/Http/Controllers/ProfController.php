<?php

namespace App\Http\Controllers;

use App\Models\Prof;
use Illuminate\Http\Request;

class ProfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profs=Prof::all();
        return response()->json($profs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prof=new Prof();
        $prof->nom=$request->nom;
        $prof->prenom=$request->prenom;
        $prof->specialite=$request->specialite;
        $prof->save();
        $result=["data"=>$prof];
        return response()->json($result);
    }
    public function show($prof)
    {
        return response()->json(prof::find($prof));

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prof  $prof
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $prof=Prof::find($id);
        $prof->nom=$request->nom;
        $prof->prenom=$request->prenom;
        $prof->specialite=$request->specialite;
        $prof->save();
        $result=["data"=>$prof];
        return response()->json($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prof  $prof
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prof=Prof::find($id);
        $prof->delete();
    }
}
