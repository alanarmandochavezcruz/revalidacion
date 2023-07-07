<?php

namespace App\Http\Controllers;

use App\Models\UabjoMateria;
use Illuminate\Http\Request;

use App\Http\Requests\UabjoMateriaCreateRequest;


class UabjoMateriaController extends Controller
{
    public function __construct(){
        $this->middleware('can:create_uabjo_materias')->only('create', 'store');
        $this->middleware('can:read_uabjo_materias')->only('index', 'show');
        $this->middleware('can:update_uabjo_materias')->only('edit', 'update');
        $this->middleware('can:delete_uabjo_materias')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_uabjo_carrera)
    {
        $uabjo_materias = UabjoMateria::all()->where("id_uabjo_carrera","=",$id_uabjo_carrera);
        return view('uabjo_materias.index', compact(['uabjo_materias', 'id_uabjo_carrera']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_uabjo_carrera)
    {
        return view('uabjo_materias.create', compact(['id_uabjo_carrera']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UabjoMateriaCreateRequest $request, $id_uabjo_carrera)
    {

        //$request["id_uabjo_carrera"] = $id_uabjo_carrera;
        
         $request->validated();

         UabjoMateria::create($request->all());

         return redirect()->route('uabjo_materias.index', $id_uabjo_carrera);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UabjoMateria  $uabjoMateria
     * @return \Illuminate\Http\Response
     */
    public function show($id_uabjo_carrera, UabjoMateria $uabjoMateria)
    {
        return view('uabjo_materias.show', compact(['id_uabjo_carrera', 'uabjoMateria']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UabjoMateria  $uabjoMateria
     * @return \Illuminate\Http\Response
     */
    public function edit($id_uabjo_carrera, UabjoMateria $uabjoMateria)
    {
        return view('uabjo_materias.edit', compact(['uabjoMateria', 'id_uabjo_carrera']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UabjoMateria  $uabjoMateria
     * @return \Illuminate\Http\Response
     */
    public function update(UabjoMateriaCreateRequest $request, $id_uabjo_carrera, UabjoMateria $uabjoMateria)
    {
        $request->validated();

        $uabjoMateria->update($request->all());

        return redirect()->route('uabjo_materias.index', $id_uabjo_carrera);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UabjoMateria  $uabjoMateria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_uabjo_carrera, UabjoMateria $uabjoMateria)
    {
        $uabjoMateria->delete();
        return redirect()->route('uabjo_materias.index', $id_uabjo_carrera);
    }
}
