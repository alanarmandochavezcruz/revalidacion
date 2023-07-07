<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Carrera;
use App\Models\UabjoCarrera;

use App\Models\Universidad;
use Illuminate\Http\Request;

use App\Http\Requests\AlumnoRequest;


class AlumnoController extends Controller
{
    public function __construct(){
        $this->middleware('can:create_alumnos')->only('create', 'store');
        $this->middleware('can:read_alumnos')->only('index', 'show');
        $this->middleware('can:update_alumnos')->only('edit', 'update');
        $this->middleware('can:delete_alumnos')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        $alumnos = Alumno::where(function($query) {
            return $query->whereIn('id_carrera_universidad', Carrera::pluck('id'));
        })->get();*/

/*
$alumnos =  Alumno::join('carreras', 'alumnos.id_carrera_universidad', '=', 'carreras.id')
                  ->join('uabjo_carreras', 'alumnos.id_carrera_uabjo', '=', 'uabjo_carreras.id')
                  ->select(['alumnos.*', 'carreras.nombre As carrera_uabjo']);

        return $alumnos->toSql();
        */
        $universidades = Universidad::all();
        $uabjo_carreras = UabjoCarrera::all();
        return view('alumnos.index',compact(['uabjo_carreras', 'universidades']));
    }

    public function registros($id_uabjo_carrera, $id_universidad, $id_universidad_carrera){
        $alumnos = Alumno::where('id_carrera_uabjo', '=', $id_uabjo_carrera)->get();
        return view('alumnos.registros', compact(['alumnos', 'id_uabjo_carrera', 'id_universidad','id_universidad_carrera']));
    }

    public function universidad_carrera($id_universidad){
        $universidad_carreras = Carrera::all()->where('id_universidad','=', $id_universidad);
        
    
        $html_code = "<label>Carreras</label> <br> <select class='form-control' id='universidad_carrera'> <option value='0'>...</option>";

        foreach($universidad_carreras as $carrera){
            $html_code .= "<option value='".$carrera->id."'>".$carrera->nombre."</option>";
        }

        $html_code .= "</select>";

        return $html_code;

    }

    public function uabjo_carrera(){
        $uabjo_carreras = UabjoCarrera::all();

        $html_code = "<label>Carreras Escuela de Ciencias</label> <br> <select class='form-control' id='uabjo_carrera'> <option value='0'>...</option>";

        foreach($uabjo_carreras as $uabjo_carrera){
            $html_code .= "<option value='".$uabjo_carrera->id."'>".$uabjo_carrera->nombre."</option>";
        }

        $html_code .= "</select>";

        return $html_code;

    }






    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_uabjo_carrera, $id_universidad, $id_universidad_carrera)
    {
        //return $id_uabjo_carrera;
        return view('alumnos.create', compact(['id_uabjo_carrera', 'id_universidad', 'id_universidad_carrera']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlumnoRequest $request, $id_uabjo_carrera, $id_universidad, $id_universidad_carrera)
    {

        Alumno::create($request->all());

        /*---------------------------------------------------------------------*/
        $universidades = Universidad::all();
        $html_code_universidad = "<label>Universidades</label> <br> <select class='form-control' id='universidades'> <option value='0'>Universidad</option>";
        foreach($universidades as $universidad){
            $selected_html = $universidad->id == $id_universidad ? 'selected' : '';
            $html_code_universidad .= "<option value='".$universidad->id."' ".$selected_html.">".$universidad->nombre."</option>";
        }
        $html_code_universidad .= "</select>";

        /*---------------------------------------------------------------------*/

        /*---------------------------------------------------------------------*/
        $uabjo_carreras = UabjoCarrera::all();

        $html_code_uabjo_carreras = "<label>Carreras Escuela de Ciencias</label> <br> <select class='form-control' id='uabjo_carrera'> <option value='0'>...</option>";

        foreach($uabjo_carreras as $uabjo_carrera){


            $selected_html = $uabjo_carrera->id == $id_uabjo_carrera ? 'selected' : '';

            $html_code_uabjo_carreras .= "<option value='".$uabjo_carrera->id."' ".$selected_html.">".$uabjo_carrera->nombre."</option>";
        }

        $html_code_uabjo_carreras .= "</select>";
        /*---------------------------------------------------------------------*/

        /*---------------------------------------------------------------------*/
        $universidad_carreras = Carrera::all()->where('id_universidad','=', $id_universidad);
        
    
        $html_code_universidad_carreras = "<label>Carreras</label> <br> <select class='form-control' id='universidad_carrera'> <option value='0'>...</option>";

        foreach($universidad_carreras as $carrera){
            $selected_html = $carrera->id == $id_universidad_carrera ? 'selected' : '';
            $html_code_universidad_carreras .= "<option value='".$carrera->id."' ".$selected_html.">".$carrera->nombre."</option>";
        }

        $html_code_universidad_carreras .= "</select>";
        /*---------------------------------------------------------------------*/



        return redirect()->route('alumnos.index')->with(['id_uabjo_carrera'=>$html_code_uabjo_carreras, 'id_universidad_carrera'=>$html_code_universidad_carreras, 'id_universidad'=>$html_code_universidad]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function show(Alumno $alumno, $id_uabjo_carrera, $id_universidad, $id_universidad_carrera)
    {
        return view('alumnos.show', compact(['alumno', 'id_uabjo_carrera', 'id_universidad', 'id_universidad_carrera']) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */

    public function edit(Alumno $alumno, $id_uabjo_carrera, $id_universidad, $id_universidad_carrera)
    {
        return view('alumnos.edit', compact(['alumno', 'id_uabjo_carrera', 'id_universidad', 'id_universidad_carrera']) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(AlumnoRequest $request, Alumno $alumno, $id_uabjo_carrera, $id_universidad, $id_universidad_carrera)
    {
        $request->validated();
        $alumno->update($request->all());


        /*---------------------------------------------------------------------*/
        $universidades = Universidad::all();
        $html_code_universidad = "<label>Universidades</label> <br> <select class='form-control' id='universidades'> <option value='0'>Universidad</option>";
        foreach($universidades as $universidad){
            $selected_html = $universidad->id == $id_universidad ? 'selected' : '';
            $html_code_universidad .= "<option value='".$universidad->id."' ".$selected_html.">".$universidad->nombre."</option>";
        }
        $html_code_universidad .= "</select>";

        /*---------------------------------------------------------------------*/


        /*---------------------------------------------------------------------*/
        $uabjo_carreras = UabjoCarrera::all();

        $html_code_uabjo_carreras = "<label>Carreras Escuela de Ciencias</label> <br> <select class='form-control' id='uabjo_carrera'> <option value='0'>...</option>";

        foreach($uabjo_carreras as $uabjo_carrera){


            $selected_html = $uabjo_carrera->id == $id_uabjo_carrera ? 'selected' : '';

            $html_code_uabjo_carreras .= "<option value='".$uabjo_carrera->id."' ".$selected_html.">".$uabjo_carrera->nombre."</option>";
        }

        $html_code_uabjo_carreras .= "</select>";
        /*---------------------------------------------------------------------*/

        /*---------------------------------------------------------------------*/
        $universidad_carreras = Carrera::all()->where('id_universidad','=', $id_universidad);
        
    
        $html_code_universidad_carreras = "<label>Carreras</label> <br> <select class='form-control' id='universidad_carrera'> <option value='0'>...</option>";

        foreach($universidad_carreras as $carrera){
            $selected_html = $carrera->id == $id_universidad_carrera ? 'selected' : '';
            $html_code_universidad_carreras .= "<option value='".$carrera->id."' ".$selected_html.">".$carrera->nombre."</option>";
        }

        $html_code_universidad_carreras .= "</select>";
        /*---------------------------------------------------------------------*/



        return redirect()->route('alumnos.index')->with(['id_uabjo_carrera'=>$html_code_uabjo_carreras, 'id_universidad_carrera'=>$html_code_universidad_carreras, 'id_universidad'=>$html_code_universidad]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumno $alumno, $id_uabjo_carrera, $id_universidad, $id_universidad_carrera)
    {
        $alumno->delete();

        /*---------------------------------------------------------------------*/
        $universidades = Universidad::all();
        $html_code_universidad = "<label>Universidades</label> <br> <select class='form-control' id='universidades'> <option value='0'>Universidad</option>";
        foreach($universidades as $universidad){
            $selected_html = $universidad->id == $id_universidad ? 'selected' : '';
            $html_code_universidad .= "<option value='".$universidad->id."' ".$selected_html.">".$universidad->nombre."</option>";
        }
        $html_code_universidad .= "</select>";

        /*---------------------------------------------------------------------*/

        /*---------------------------------------------------------------------*/
        $uabjo_carreras = UabjoCarrera::all();

        $html_code_uabjo_carreras = "<label>Carreras Escuela de Ciencias</label> <br> <select class='form-control' id='uabjo_carrera'> <option value='0'>...</option>";

        foreach($uabjo_carreras as $uabjo_carrera){


            $selected_html = $uabjo_carrera->id == $id_uabjo_carrera ? 'selected' : '';

            $html_code_uabjo_carreras .= "<option value='".$uabjo_carrera->id."' ".$selected_html.">".$uabjo_carrera->nombre."</option>";
        }

        $html_code_uabjo_carreras .= "</select>";
        /*---------------------------------------------------------------------*/

        /*---------------------------------------------------------------------*/
        $universidad_carreras = Carrera::all()->where('id_universidad','=', $id_universidad);
        
    
        $html_code_universidad_carreras = "<label>Carreras</label> <br> <select class='form-control' id='universidad_carrera'> <option value='0'>...</option>";

        foreach($universidad_carreras as $carrera){
            $selected_html = $carrera->id == $id_universidad_carrera ? 'selected' : '';
            $html_code_universidad_carreras .= "<option value='".$carrera->id."' ".$selected_html.">".$carrera->nombre."</option>";
        }

        $html_code_universidad_carreras .= "</select>";
        /*---------------------------------------------------------------------*/

        return redirect()->route('alumnos.index')->with(['id_uabjo_carrera'=>$html_code_uabjo_carreras, 'id_universidad_carrera'=>$html_code_universidad_carreras, 'id_universidad'=>$html_code_universidad]);
    }
}
