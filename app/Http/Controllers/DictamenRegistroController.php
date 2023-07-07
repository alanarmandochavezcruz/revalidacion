<?php

namespace App\Http\Controllers;


use App\Models\UabjoCarrera;
use App\Models\DictamenRegistro;
use Illuminate\Http\Request;

use App\Http\Requests\DictamenRegistroRequest;

class DictamenRegistroController extends Controller
{
    
    public function __construct(){
        $this->middleware('can:create_dictamen')->only('create', 'store');
        $this->middleware('can:read_dictamen')->only('index', 'show');
        $this->middleware('can:update_dictamen')->only('edit', 'update');
        $this->middleware('can:delete_dictamen')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_alumno)
    {
        $dictamen_registros = DictamenRegistro::all()->where('id_alumno', '=', $id_alumno);
        return view('dictamen_registros.index', compact(['dictamen_registros', 'id_alumno']));
        

        /*
        $uabjo_carreras = $this->uabjo_carreras_select();
        return $uabjo_carreras;
        */
    }

    public function uabjo_carreras_select(){
        $uabjo_carreras = UabjoCarrera::all();
        return compact('uabjo_carreras');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_alumno)
    {
        return view("dictamen_registros.create", compact('id_alumno'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DictamenRegistroRequest $request, $id_alumno)
    {
        DictamenRegistro::create($request->all());
        return redirect()->route('predictamen.index', compact('id_alumno'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DictamenRegistro  $dictamenRegistro
     * @return \Illuminate\Http\Response
     */
    public function show(DictamenRegistro $dictamenRegistro)
    {
        return view('dictamen_registros.show', compact('dictamenRegistro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DictamenRegistro  $dictamenRegistro
     * @return \Illuminate\Http\Response
     */
    public function edit(DictamenRegistro $dictamenRegistro)
    {
        return view('dictamen_registros.edit', compact('dictamenRegistro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DictamenRegistro  $dictamenRegistro
     * @return \Illuminate\Http\Response
     */
    public function update(DictamenRegistroRequest $request, DictamenRegistro $dictamenRegistro, $id_alumno)
    {
        $dictamenRegistro->update($request->all());

        return redirect()->route('predictamen.index', compact('id_alumno'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DictamenRegistro  $dictamenRegistro
     * @return \Illuminate\Http\Response
     */
    public function destroy(DictamenRegistro $dictamenRegistro)
    {
        $id_alumno = $dictamenRegistro->id_alumno;
        $dictamenRegistro->delete();

        return redirect()->route('predictamen.index', compact('id_alumno'));

    }
}
