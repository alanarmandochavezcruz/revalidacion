<?php

namespace App\Http\Controllers;

use App\Models\RevalidacionRegistro;
use Illuminate\Http\Request;


use App\Models\DictamenRegistro;
use App\Models\Alumno;
use App\Models\Carrera;
use App\Models\Universidad;
use App\Models\UabjoCarrera;
use App\Models\UabjoMateria;
use App\Models\UabjoOptativa;
use App\Models\Materia;
use App\Models\Optativa;
use DB;


use App\Http\Requests\RevalidacionRequest;


use PDF;

class RevalidacionRegistroController extends Controller
{
    public function __construct(){
        $this->middleware('can:create_revalidacion')->only('create', 'store');
        $this->middleware('can:read_revalidacion')->only('index', 'show', 'formato');
        $this->middleware('can:update_revalidacion')->only('edit', 'update');
        $this->middleware('can:delete_revalidacion')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_predictamen)
    {

        $predictamen = DictamenRegistro::all()->find($id_predictamen);
        $id_alumno = $predictamen->id_alumno;
        $alumno = Alumno::all()->find($id_alumno);
        $id_uabjo_carrera = $alumno->id_carrera_uabjo;


/*
        $registros = DB::select("
SELECT 
IFNULL(revalidacion_registros.id, '0') AS id,
revalidacion_registros.dictamen,
IFNULL(materias.id, '0') AS id_materia_universidad,
IFNULL(optativas.id, '0') AS id_optativa_universidad,
uabjo_materias.id AS id_uabjo_materia, 
IFNULL(uabjo_optativas.id, '0') AS id_uabjo_optativa, 
IFNULL(revalidacion_registros.calificacion, '0') AS calificacion,
uabjo_materias.nombre AS uabjo_materia, 
uabjo_materias.tipo AS uabjo_materia_tipo,
uabjo_optativas.nombre AS uabjo_optativa,
materias.id_carrera AS id_carrera_universidad,
IFNULL(materias.nombre, '') AS universidad_materia, 
IFNULL(optativas.nombre, '') AS universidad_optativa,


uabjo_materias.id_uabjo_carrera, 
uabjo_optativas.id_uabjo_carrera AS uabjocarrera_optativa 




FROM 
revalidacion_registros 
RIGHT JOIN uabjo_materias 
ON 
revalidacion_registros.uabjo_materia=uabjo_materias.id 
LEFT JOIN materias 
ON 
revalidacion_registros.universidad_carrera_materia = materias.id 
LEFT JOIN uabjo_optativas 
ON 
revalidacion_registros.uabjo_optativa=uabjo_optativas.id 
LEFT JOIN optativas 
ON 
revalidacion_registros.universidad_carrera_optativa = optativas.id            
WHERE
uabjo_materias.id_uabjo_carrera=:id_uabjo_carrera", ['id_uabjo_carrera' => $id_uabjo_carrera]);
*/



        $registros = DB::select("
SELECT
uabjo_materias.id AS id_uabjo_materia,


IFNULL(
(
    SELECT DISTINCT
        revalidacion_registros.id
    FROM 
        revalidacion_registros, uabjo_materias
    WHERE
        (revalidacion_registros.uabjo_materia=id_uabjo_materia)     
        AND
        (revalidacion_registros.dictamen = :id_predictamen_1)  
), '0') AS id,

uabjo_materias.id_uabjo_carrera,
uabjo_materias.nombre AS uabjo_materia,
uabjo_materias.tipo AS uabjo_materia_tipo,
:id_predictamen AS dictamen,

IFNULL(
(
    SELECT 
    uabjo_optativas.id 
    FROM 
    uabjo_optativas, revalidacion_registros, uabjo_carreras 
    WHERE 
    (revalidacion_registros.uabjo_optativa = uabjo_optativas.id) 
    AND
    (revalidacion_registros.dictamen = :id_predictamen_2) 
    AND 
    (revalidacion_registros.uabjo_materia = id_uabjo_materia) 
    AND 
    (uabjo_optativas.id_uabjo_carrera = uabjo_carreras.id) 
), '0') AS id_uabjo_optativa,

IFNULL(
(
    SELECT 
    materias.id 
    FROM 
    materias, revalidacion_registros, carreras 
    WHERE 
    (revalidacion_registros.universidad_carrera_materia = materias.id) 
    AND
    (revalidacion_registros.dictamen = :id_predictamen_3) 
    AND 
    (revalidacion_registros.uabjo_materia = id_uabjo_materia) 
    AND 
    (materias.id_carrera = carreras.id) 
), '0') AS id_materia_universidad,

IFNULL(
(
    SELECT 
    optativas.id 
    FROM 
    optativas, revalidacion_registros, carreras 
    WHERE 
    (revalidacion_registros.universidad_carrera_optativa = optativas.id) 
    AND
    (revalidacion_registros.dictamen = :id_predictamen_4) 
    AND 
    (revalidacion_registros.uabjo_optativa = id_uabjo_optativa) 
    AND 
    (optativas.id_carrera = carreras.id) 
), '0') AS id_optativa_universidad,

IFNULL( (
    SELECT DISTINCT
        revalidacion_registros.calificacion
    FROM 
        revalidacion_registros, uabjo_materias
    WHERE
        (revalidacion_registros.uabjo_materia=id_uabjo_materia)     
        AND
        (revalidacion_registros.dictamen = :id_predictamen_5)  
), '0') AS calificacion,


IFNULL( 
    (SELECT materias.id_carrera FROM materias WHERE materias.id=id_materia_universidad), '0'
) AS id_carrera_universidad,


IFNULL( 
    (SELECT uabjo_optativas.id_uabjo_carrera FROM uabjo_optativas WHERE uabjo_optativas.id=id_uabjo_optativa), '0'
) AS uabjocarrera_optativa,


IFNULL(
    (SELECT uabjo_optativas.nombre FROM uabjo_optativas WHERE uabjo_optativas.id=id_uabjo_optativa), ''
) AS uabjo_optativa,


IFNULL( 
    (SELECT materias.nombre FROM materias WHERE materias.id=id_materia_universidad), ''
) AS universidad_materia,


IFNULL( 
    (SELECT optativas.nombre FROM optativas WHERE optativas.id=id_optativa_universidad), ''
) AS universidad_optativa


FROM
uabjo_materias
WHERE
uabjo_materias.id_uabjo_carrera=:id_uabjo_carrera", ["id_uabjo_carrera" => $id_uabjo_carrera, "id_predictamen"=>$id_predictamen, "id_predictamen_1"=>$id_predictamen, "id_predictamen_2"=>$id_predictamen, "id_predictamen_3"=>$id_predictamen, "id_predictamen_4"=>$id_predictamen, "id_predictamen_5"=>$id_predictamen]);


        return view('revalidacion.index', compact('registros', 'alumno'), ['id_predictamen' => $predictamen->id]);

        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_predictamen, $id_uabjo_materia)
    {
        $uabjo_materia = UabjoMateria::select('id', 'nombre', 'tipo')->find($id_uabjo_materia);
        $id_alumno = DictamenRegistro::select('id_alumno')->find($id_predictamen);
        $alumno_datos = Alumno::select('id_carrera_universidad', 'id_carrera_uabjo')->find($id_alumno);


        //-----------------------------------------------------------------------------------------------        
        //-----------------------------------------------------------------------------------------------
        $uabjo_optativas = [];
        if($uabjo_materia->tipo == 'optativa'){
            //obtienes los id's de la tabla uabjo_optativas que estan asociadas al id del dictamen ya que estos solo pueden estar asociados a una solo registro
            $ids_arreglo_uabjo_optativa = RevalidacionRegistro::where('dictamen', '=', $id_predictamen)->whereNotNull('uabjo_optativa')->get(['uabjo_optativa'])->pluck('uabjo_optativa');

            $uabjo_optativas = UabjoOptativa::select("id", "id_uabjo_carrera", "nombre")
                    ->where('id_uabjo_carrera', '=', $alumno_datos[0]->id_carrera_uabjo)
                    ->whereNotIn('id', $ids_arreglo_uabjo_optativa)
                    ->get();
        }
        //-----------------------------------------------------------------------------------------------        
        //-----------------------------------------------------------------------------------------------


        //-----------------------------------------------------------------------------------------------        
        //-----------------------------------------------------------------------------------------------
        $ids_arreglo_universidad_carrera_materia = RevalidacionRegistro::where('dictamen', '=', $id_predictamen)->get(['universidad_carrera_materia'])->pluck('universidad_carrera_materia');

        $universidad_materias = Materia::select("id", "id_carrera", "nombre", "tipo")
        ->where('id_carrera', '=', $alumno_datos[0]->id_carrera_universidad)
        ->whereNotIn('id', $ids_arreglo_universidad_carrera_materia)
                    ->get();
        //-----------------------------------------------------------------------------------------------        
        //-----------------------------------------------------------------------------------------------


        //-----------------------------------------------------------------------------------------------        
        //-----------------------------------------------------------------------------------------------
                    $universidad_optativas =[];
        $ids_arreglo_universidad_optativa = RevalidacionRegistro::where('dictamen', '=', $id_predictamen)->whereNotNull('universidad_carrera_optativa')->get(['universidad_carrera_optativa'])->pluck('universidad_carrera_optativa');
            $universidad_optativas = Optativa::select("id", "id_carrera", "nombre")
                    ->where('id_carrera', '=', $alumno_datos[0]->id_carrera_universidad)
                    ->whereNotIn('id', $ids_arreglo_universidad_optativa)
                    ->get();
        //-----------------------------------------------------------------------------------------------        
        //-----------------------------------------------------------------------------------------------


        return view('revalidacion.create', compact(['uabjo_materia', 'uabjo_optativas', 'universidad_materias', 'universidad_optativas', 'id_predictamen']) );

//return $id_predictamen;

        // $id_predictamen    $id_alumno



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RevalidacionRequest $request, $id_predictamen, $id_uabjo_materia)
    {
        /*
        if(!$request->filled('universidad_carrera_optativa')) {
                $request["universidad_carrera_optativa"] = null;
        }*/
        
        RevalidacionRegistro::create($request->all());

        return redirect()->route('revalidacion.index', $id_predictamen);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RevalidacionRegistro  $revalidacionRegistro
     * @return \Illuminate\Http\Response
     */
    public function show(RevalidacionRegistro $revalidacionRegistro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RevalidacionRegistro  $revalidacionRegistro
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $revalidacionRegistro = RevalidacionRegistro::find($id);

        $id_predictamen = $revalidacionRegistro->dictamen;
        $id_uabjo_materia = $revalidacionRegistro->uabjo_materia;

        $uabjo_materia = UabjoMateria::select('id', 'nombre', 'tipo')->find($id_uabjo_materia);
        $id_alumno = DictamenRegistro::select('id_alumno')->find($id_predictamen);
        $alumno_datos = Alumno::select('id_carrera_universidad', 'id_carrera_uabjo')->find($id_alumno);


        //-----------------------------------------------------------------------------------------------        
        //-----------------------------------------------------------------------------------------------
        $uabjo_optativas = [];
        if($uabjo_materia->tipo == 'optativa'){
            //obtienes los id's de la tabla uabjo_optativas que estan asociadas al id del dictamen ya que estos solo pueden estar asociados a una solo registro
            $ids_arreglo_uabjo_optativa = RevalidacionRegistro::where('dictamen', '=', $id_predictamen)->whereNotNull('uabjo_optativa')->get(['uabjo_optativa'])->pluck('uabjo_optativa');


            if($revalidacionRegistro->uabjo_optativa){
            
            $uabjo_optativas = UabjoOptativa::select("id", "id_uabjo_carrera", "nombre")
                    ->where('id_uabjo_carrera', '=', $alumno_datos[0]->id_carrera_uabjo)
                    ->orWhere('id', '=', $revalidacionRegistro->uabjo_optativa)
                    ->whereNotIn('id', $ids_arreglo_uabjo_optativa)
                    ->get();

            }else{

            $uabjo_optativas = UabjoOptativa::select("id", "id_uabjo_carrera", "nombre")
                    ->where('id_uabjo_carrera', '=', $alumno_datos[0]->id_carrera_uabjo)
                    ->whereNotIn('id', $ids_arreglo_uabjo_optativa)
                    ->get();

            }
        }
        //-----------------------------------------------------------------------------------------------        
        //-----------------------------------------------------------------------------------------------


        //-----------------------------------------------------------------------------------------------        
        //-----------------------------------------------------------------------------------------------
        $ids_arreglo_universidad_carrera_materia = RevalidacionRegistro::where('dictamen', '=', $id_predictamen)->get(['universidad_carrera_materia'])->pluck('universidad_carrera_materia');

        
                $universidad_materias = Materia::select("id", "id_carrera", "nombre", "tipo")
                ->where('id','=',$revalidacionRegistro->universidad_carrera_materia)
                ->orWhere('id_carrera', '=', $alumno_datos[0]->id_carrera_universidad)
                ->whereNotIn('id', $ids_arreglo_universidad_carrera_materia)
                    ->get();
        //-----------------------------------------------------------------------------------------------        
        //-----------------------------------------------------------------------------------------------


        //-----------------------------------------------------------------------------------------------        
        //-----------------------------------------------------------------------------------------------
                    $universidad_optativas =[];
        $ids_arreglo_universidad_optativa = RevalidacionRegistro::where('dictamen', '=', $id_predictamen)->whereNotNull('universidad_carrera_optativa')->get(['universidad_carrera_optativa'])->pluck('universidad_carrera_optativa');


            if($revalidacionRegistro->universidad_carrera_optativa){

            $universidad_optativas = Optativa::select("id", "id_carrera", "nombre")
                    ->where('id', '=', $revalidacionRegistro->universidad_carrera_optativa)
                    ->orWhere('id_carrera', '=', $alumno_datos[0]->id_carrera_universidad)
                    ->whereNotIn('id', $ids_arreglo_universidad_optativa)
                    ->get();
            }else{

            $universidad_optativas = Optativa::select("id", "id_carrera", "nombre")
                    ->where('id_carrera', '=', $alumno_datos[0]->id_carrera_universidad)
                    ->whereNotIn('id', $ids_arreglo_universidad_optativa)
                    ->get();
            }
        //-----------------------------------------------------------------------------------------------        
        //-----------------------------------------------------------------------------------------------


        return view('revalidacion.edit', compact(['revalidacionRegistro', 'uabjo_materia', 'uabjo_optativas', 'universidad_materias', 'universidad_optativas', 'id_predictamen']) );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RevalidacionRegistro  $revalidacionRegistro
     * @return \Illuminate\Http\Response
     */
    public function update(RevalidacionRequest $request, $id_revalidacion, $id_predictamen, $id_uabjo_materia)
    {
        $revalidacionRegistro = RevalidacionRegistro::find($id_revalidacion);
        
        $revalidacionRegistro->update($request->all());

        return redirect()->route('revalidacion.index', $id_predictamen);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RevalidacionRegistro  $revalidacionRegistro
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $revalidacionRegistro = RevalidacionRegistro::find($id);
        $id_predictamen = $revalidacionRegistro->dictamen;
        $revalidacionRegistro->delete();

        return redirect()->route('revalidacion.index', $id_predictamen);
    }


    public function formato($predictamen){

        $dictamen_registro = DictamenRegistro::find($predictamen);
        $alumno = Alumno::find($dictamen_registro->id_alumno);

        $carrera = Carrera::find($alumno->id_carrera_universidad);
        $universidad = Universidad::find($carrera->id_universidad);

        $uabjo_carrera = UabjoCarrera::find($alumno->id_carrera_uabjo);


        //--------------------------------------------------------------------------
        //--------------------------------------------------------------------------

        $registros = DB::select("
SELECT 
IFNULL(revalidacion_registros.id, '0') AS id,
revalidacion_registros.dictamen,
IFNULL(materias.id, '0') AS id_materia_universidad,
IFNULL(optativas.id, '0') AS id_optativa_universidad,
uabjo_materias.id AS id_uabjo_materia, 
IFNULL(uabjo_optativas.id, '0') AS id_uabjo_optativa, 
IFNULL(revalidacion_registros.tipo_aprobacion, '') AS tipo_aprobacion,
IFNULL(revalidacion_registros.calificacion, '0') AS calificacion,
uabjo_materias.nombre AS uabjo_materia, 
uabjo_materias.tipo AS uabjo_materia_tipo,
uabjo_optativas.nombre AS uabjo_optativa,
materias.id_carrera AS id_carrera_universidad,
IFNULL(materias.nombre, '') AS universidad_materia, 
materias.tipo AS universidad_materia_tipo,
IFNULL(optativas.nombre, '') AS universidad_optativa,


uabjo_materias.id_uabjo_carrera, 
uabjo_optativas.id_uabjo_carrera AS uabjocarrera_optativa 




FROM 
revalidacion_registros 
RIGHT JOIN uabjo_materias 
ON 
revalidacion_registros.uabjo_materia=uabjo_materias.id 
LEFT JOIN materias 
ON 
revalidacion_registros.universidad_carrera_materia = materias.id 
LEFT JOIN uabjo_optativas 
ON 
revalidacion_registros.uabjo_optativa=uabjo_optativas.id 
LEFT JOIN optativas 
ON 
revalidacion_registros.universidad_carrera_optativa = optativas.id            
WHERE
(uabjo_materias.id_uabjo_carrera=:id_uabjo_carrera) AND (revalidacion_registros.dictamen=:id_dictamen)", ['id_uabjo_carrera' => $uabjo_carrera->id, 'id_dictamen' => $dictamen_registro->id]);


        //--------------------------------------------------------------------------
        //--------------------------------------------------------------------------


        $pdf = PDF::loadView('revalidacion.formato', compact(['registros', 'dictamen_registro', 'alumno', 'carrera', 'universidad', 'uabjo_carrera']));
        return $pdf->stream('formato.pdf');

    }
}
