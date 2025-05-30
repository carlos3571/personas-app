<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $departamentos = DB::table('tb_departamento')
        ->join('tb_pais', 'tb_departamento.pais_codi', '=', 'tb_pais.pais_codi')
        ->select('tb_departamento.*', 'tb_pais.pais_nomb')
        ->get();
        
        return view('departamento.index', ['departamentos' => $departamentos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $paises = DB::table('tb_pais')
        ->orderBy('pais_nomb')
        ->get();
        return view('departamento.new', ['paises' => $paises]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $departamento = new Departamento();
        // $departamento->depa_codi = $request->id;
        // El codigo de departamento es autoincremental
        $departamento->depa_nomb = $request->departamento;
        $departamento->pais_codi = $request->pais;
        $departamento->save();

        $departamentos = DB::table('tb_departamento')
        ->join('tb_pais', 'tb_departamento.pais_codi', '=', 'tb_pais.pais_codi')
        ->select('tb_departamento.*', 'tb_pais.pais_nomb')
        ->get();
        return view('departamento.index', ['departamentos' => $departamentos]);
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
     * 
     * @param int $id
     * @return \Illumninate\Http\Response
     */
    public function edit($id)
    {
        //
        $departamento = Departamento::find($id);    
        $paises = DB::table('tb_pais')
        ->orderBy('pais_nomb')
        ->get();

        return view('departamento.edit', ['departamento' => $departamento, 'paises' => $paises]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $departamento = Departamento::find($id);

        $departamento->depa_nomb = $request->departamento;
        $departamento->pais_codi = $request->pais;
        $departamento->save();

        $departamentos = DB::table('tb_departamento')
        ->join('tb_pais', 'tb_departamento.pais_codi', '=', 'tb_pais.pais_codi')
        ->select('tb_departamento.*', 'tb_pais.pais_nomb')
        ->get();

        return view('departamento.index', ['departamentos' => $departamentos]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $departamento = Departamento::find($id);
        $departamento->delete();

        $departamentos = DB::table('tb_departamento')
        ->join('tb_pais', 'tb_departamento.pais_codi', '=', 'tb_pais.pais_codi')
        ->select('tb_departamento.*', 'tb_pais.pais_nomb')
        ->get();

        return view('departamento.index', ['departamentos' => $departamentos]);
    }
}
