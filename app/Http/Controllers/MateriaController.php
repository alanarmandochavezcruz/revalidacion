<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;

use App\Http\Requests\MateriaRequest;

class MateriaController extends Controller
{
    public function __construct(){
        $this->middleware('can:create_materias')->only('create', 'store');
        $this->middleware('can:read_materias')->only('index', 'show');
        $this->middleware('can:update_materias')->only('edit', 'update');
        $this->middleware('can:delete_materias')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_universidad, $id_carrera)
    {
        $materias = Materia::all()->where('id_carrera','=',$id_carrera);
        return view('materias.index', compact(['id_universidad', 'id_carrera', 'materias']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_universidad, $id_carrera)
    {
        return view('materias.create', compact(['id_universidad','id_carrera']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MateriaRequest $request, $id_universidad, $id_carrera)
    {
        $request->validated();

        Materia::create($request->all());

        return redirect()->route('materias.index', compact(['id_universidad', 'id_carrera']) );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function show(Materia $materia, $id_universidad, $id_carrera)
    {
        return view('materias.show', compact(['materia', 'id_universidad', 'id_carrera']) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function edit(Materia $materia, $id_universidad, $id_carrera)
    {
        return view('materias.edit', compact(['materia', 'id_universidad', 'id_carrera']) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function update(MateriaRequest $request, Materia $materia, $id_universidad, $id_carrera)
    {
        
        $request->validated();

        $materia->update($request->all());

        return redirect()->route('materias.index', compact(['id_universidad', 'id_carrera']) );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materia $materia, $id_universidad, $id_carrera)
    {
        $materia->delete();

        
        return redirect()->route('materias.index', compact(['id_universidad', 'id_carrera']) );
    }
}
