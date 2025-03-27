<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paises = DB::table('tb_pais')
            ->select('tb_pais.*')
            ->orderBy('tb_pais.pais_codi')
            ->get();
        return view('pais.index',['paises'=>$paises]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $paises = DB::table('tb_pais')
            ->select('tb_pais.*')
            ->orderBy('pais_nomb')
            ->get();
        return view('pais.new',['paises'=>$paises]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pais = new Pais();

        $pais->pais_nomb = $request->name;
        $pais->pais_codi = $request->id;
        $pais->pais_capi = $request->capi;
        $pais->save();

        $paises = DB::table('tb_pais')
            ->select('tb_pais.*')
            ->orderBy('tb_pais.pais_codi', 'desc')
            ->get();

            return view('pais.index',['paises'=>$paises]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pais = Pais::find($id);

        $paises = DB::table('tb_pais')
            ->select('tb_pais.*')
            ->orderBy('tb_pais.pais_codi', 'desc')
            ->get();
        return view('pais.edit',['pais'=>$pais]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pais = Pais::find($id);

        $pais->pais_nomb = $request->name;
        //$pais->pais_codi = $request->id;
        $pais->save();

        $paises = DB::table('tb_pais')
            ->select('tb_pais.*')
            ->orderBy('tb_pais.pais_codi', 'desc')
            ->get();
        return view('pais.index',['paises'=>$paises]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pais = Pais::find($id);
        $pais->delete();

        $paises = DB::table('tb_pais')
            ->select('tb_pais.*')
            ->orderBy('tb_pais.pais_codi', 'desc')
            ->get();
        return view('pais.index',['paises'=>$paises]);
    }
}