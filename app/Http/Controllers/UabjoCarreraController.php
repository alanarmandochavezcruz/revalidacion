<?php

namespace App\Http\Controllers;

use App\Models\UabjoCarrera;
use Illuminate\Http\Request;

use App\Http\Requests\UabjoCarreraRequest;

class UabjoCarreraController extends Controller
{
    public function __construct(){
        $this->middleware('can:create_uabjo_carreras')->only('create', 'store');
        $this->middleware('can:read_uabjo_carreras')->only('index', 'show');
        $this->middleware('can:update_uabjo_carreras')->only('edit', 'update');
        $this->middleware('can:delete_uabjo_carreras')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uabjo_carreras = UabjoCarrera::orderBy('updated_at','DESC')->get();
        return view('uabjo_carreras.index', compact('uabjo_carreras'));
    }


    public function registros()
    {
        //$alumnos=Alumno::orderBy('curp','DESC')->paginate();
        //return view('Alumno.registro', compact('alumnos'));


        $uabjo_carreras = UabjoCarrera::orderBy('updated_at','DESC')->get();
        return view('uabjo_carreras.registros', compact('uabjo_carreras'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('uabjo_carreras.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UabjoCarreraRequest $request)
    {
        UabjoCarrera::Create($request->all()); 
        return redirect()->route('uabjo_carreras.index');       
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UabjoCarrera  $uabjoCarrera
     * @return \Illuminate\Http\Response
     */
    public function show(UabjoCarrera $uabjoCarrera)
    {
        return view('uabjo_carreras.show', compact('uabjoCarrera'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UabjoCarrera  $uabjoCarrera
     * @return \Illuminate\Http\Response
     */
    public function edit(UabjoCarrera $uabjoCarrera)
    {
        return view('uabjo_carreras.edit', compact('uabjoCarrera'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UabjoCarrera  $uabjoCarrera
     * @return \Illuminate\Http\Response
     */
    public function update(UabjoCarreraRequest $request, UabjoCarrera $uabjoCarrera)
    {
        $uabjoCarrera->update($request->all()); 
        return redirect()->route('uabjo_carreras.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UabjoCarrera  $uabjoCarrera
     * @return \Illuminate\Http\Response
     */
    public function destroy(UabjoCarrera $uabjoCarrera)
    {
        $uabjoCarrera->delete(); 
        return redirect()->route('uabjo_carreras.index'); 
    }
}
