<?php

namespace App\Http\Controllers;

use App\Models\Optativa;
use Illuminate\Http\Request;

use App\Http\Requests\OptativaRequest;

class OptativaController extends Controller
{
    public function __construct(){
        $this->middleware('can:create_optativas')->only('create', 'store');
        $this->middleware('can:read_optativas')->only('index', 'show');
        $this->middleware('can:update_optativas')->only('edit', 'update');
        $this->middleware('can:delete_optativas')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_universidad, $id_carrera)
    {
        $optativas = Optativa::all()->where('id_carrera', '=', $id_carrera);
        return view('optativas.index', compact(['optativas', 'id_universidad', 'id_carrera']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_universidad, $id_carrera)
    {
        return view('optativas.create', compact(['id_universidad', 'id_carrera']) );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OptativaRequest $request, $id_universidad, $id_carrera)
    {
        $request->validated();

        Optativa::create($request->all());

        return redirect()->route('optativas.index', compact(['id_universidad', 'id_carrera']));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Optativa  $optativa
     * @return \Illuminate\Http\Response
     */
    public function show(Optativa $optativa, $id_universidad, $id_carrera)
    {
        return view('optativas.show', compact(['optativa', 'id_universidad', 'id_carrera']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Optativa  $optativa
     * @return \Illuminate\Http\Response
     */
    public function edit(Optativa $optativa, $id_universidad, $id_carrera)
    {
        return view('optativas.edit', compact(['optativa', 'id_universidad', 'id_carrera']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Optativa  $optativa
     * @return \Illuminate\Http\Response
     */
    public function update(OptativaRequest $request, Optativa $optativa,$id_universidad, $id_carrera)
    {
        $request->validated();

        $optativa->update($request->all());

        return redirect()->route('optativas.index', compact(['id_universidad', 'id_carrera']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Optativa  $optativa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Optativa $optativa,$id_universidad, $id_carrera)
    {
        $optativa->delete();
        
        return redirect()->route('optativas.index', compact(['id_universidad', 'id_carrera']));
    }
}
