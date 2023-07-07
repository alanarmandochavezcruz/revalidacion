<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use Illuminate\Http\Request;



use App\Http\Requests\CarreraRequest;

class CarreraController extends Controller
{

    public function __construct(){
        $this->middleware('can:create_carreras')->only('create', 'store');
        $this->middleware('can:read_carreras')->only('index', 'show');
        $this->middleware('can:update_carreras')->only('edit', 'update');
        $this->middleware('can:delete_carreras')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_universidad)
    {

        $carreras = Carrera::all()->where(
            'id_universidad', '=' ,$id_universidad
        );


/*
        $carreras = Carrera::where(
            'id_universidad', '=' ,$id_universidad
        )->whereBetween('edad',['15','18'])->toSql();
*/

        /*

        $carreras = Carrera::where(function($query){
    $query->where('id_universidad', '1')
    ->orWhere('id_universidad', '3');
})
->where('nombre', '89')->toSql();
*/

        
        return view('carreras.index', compact(['carreras', 'id_universidad']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_universidad)
    {
        return view('carreras.create', compact('id_universidad'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarreraRequest $request, $id_universidad)
    {
        $request->validated();

        Carrera::create($request->all());

        return redirect()->route('carreras.index', compact('id_universidad'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function show(Carrera $carrera, $id_universidad)
    {
        return view('carreras.show', compact(['carrera', 'id_universidad']) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function edit(Carrera $carrera, $id_universidad)
    {
        return view('carreras.edit', compact(['carrera', 'id_universidad']) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function update(CarreraRequest $request, Carrera $carrera, $id_universidad)
    {
        $request->validated();

        $carrera->update($request->all());

        return redirect()->route('carreras.index', compact(['id_universidad']) );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carrera $carrera, $id_universidad)
    {
        $carrera->delete();

        return redirect()->route('carreras.index', compact(['id_universidad']) );

    }
}
