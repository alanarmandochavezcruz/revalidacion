<?php

namespace App\Http\Controllers;

use App\Models\UabjoOptativa;
use Illuminate\Http\Request;

use App\Http\Requests\UabjoOptativaRequest;

class UabjoOptativaController extends Controller
{
    public function __construct(){
        $this->middleware('can:create_uabjo_optativas')->only('create', 'store');
        $this->middleware('can:read_uabjo_optativas')->only('index', 'show');
        $this->middleware('can:update_uabjo_optativas')->only('edit', 'update');
        $this->middleware('can:delete_uabjo_optativas')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_uabjo_carrera)
    {
        $uabjo_optativas = UabjoOptativa::all()->where("id_uabjo_carrera","=",$id_uabjo_carrera);;
        return view('uabjo_optativas.index', compact(['id_uabjo_carrera', 'uabjo_optativas']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_uabjo_carrera)
    {
        return view('uabjo_optativas.create', compact(['id_uabjo_carrera']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UabjoOptativaRequest $request, $id_uabjo_carrera)
    {
        //$request["id_uabjo_carrera"] = $id_uabjo_carrera;


        $request->validated();

        UabjoOptativa::create($request->all());

        return redirect()->route("uabjo_optativas.index", $id_uabjo_carrera);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UabjoOptativa  $uabjoOptativa
     * @return \Illuminate\Http\Response
     */
    public function show(UabjoOptativa $uabjoOptativa, $id_uabjo_carrera)
    {
        return view('uabjo_optativas.show', compact(['uabjoOptativa', 'id_uabjo_carrera']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UabjoOptativa  $uabjoOptativa
     * @return \Illuminate\Http\Response
     */
    public function edit(UabjoOptativa $uabjoOptativa, $id_uabjo_carrera)
    {
        return view('uabjo_optativas.edit', compact(['uabjoOptativa', 'id_uabjo_carrera']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UabjoOptativa  $uabjoOptativa
     * @return \Illuminate\Http\Response
     */
    public function update(UabjoOptativaRequest $request, UabjoOptativa $uabjoOptativa, $id_uabjo_carrera)
    {
        $request->validated();

        $uabjoOptativa->update($request->all());
        return redirect()->route('uabjo_optativas.index', $id_uabjo_carrera);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UabjoOptativa  $uabjoOptativa
     * @return \Illuminate\Http\Response
     */
    public function destroy(UabjoOptativa $uabjoOptativa, $id_uabjo_carrera)
    {
        $uabjoOptativa->delete();

        return redirect()->route('uabjo_optativas.index',  $id_uabjo_carrera);
    }
}
