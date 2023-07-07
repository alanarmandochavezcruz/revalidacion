<?php

namespace App\Http\Controllers;

use App\Models\Universidad;
use Illuminate\Http\Request;

use App\Http\Requests\UniversidadRequest;

class UniversidadController extends Controller
{

    public function __construct(){
        $this->middleware('can:create_universidades')->only('create', 'store');
        $this->middleware('can:read_universidades')->only('index', 'show');
        $this->middleware('can:update_universidades')->only('edit', 'update');
        $this->middleware('can:delete_universidades')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $universidades = Universidad::all();
        return view('universidades.index', compact('universidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('universidades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UniversidadRequest $request)
    {

        Universidad::create($request->all());
        return redirect()->route('universidades.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Universidad  $universidad
     * @return \Illuminate\Http\Response
     */
    public function show(Universidad $universidad)
    {
        return view('universidades.show', compact('universidad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Universidad  $universidad
     * @return \Illuminate\Http\Response
     */
    public function edit(Universidad $universidad)
    {
        return view('universidades.edit', compact('universidad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Universidad  $universidad
     * @return \Illuminate\Http\Response
     */
    public function update(UniversidadRequest $request, Universidad $universidad)
    {


        $universidad->update($request->all());

        return redirect()->route('universidades.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Universidad  $universidad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Universidad $universidad)
    {
        $universidad->delete();

        return redirect()->route('universidades.index');
    }
}
