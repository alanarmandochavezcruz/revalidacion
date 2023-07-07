<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RevalidacionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        // $this->id_ejemplo : "id_ejemplo" debe tener el mismo nombre en la funcion del controlador y en el archivo routes web.php si tienen nombres diferentes marcara null en su valor
        // Route::post('registros/{id_ejemplo}'
        // public function store(MiRequest $request, $id_ejemplo) 
        $this->request->add(['dictamen' => $this->id_predictamen]);
        $this->request->add(['uabjo_materia' => $this->id_uabjo_materia]);

        // verifica que la propiedad universidad_carrera_optativa exista enla colleccion y si no existe la agrega y le poner el valor NULL
        if(!$this->request->has('universidad_carrera_optativa')){
          $this->request->add(['universidad_carrera_optativa' => null]);
        }


        if(!$this->request->has('uabjo_optativa')){
          $this->request->add(['uabjo_optativa' => null]);
        }

        return [
            "dictamen" => ["required", "regex:/^([1-9])([0-9]+)*$/"], 
            "uabjo_materia" => ["required", "regex:/^([1-9])([0-9]+)*$/"], 
            "uabjo_optativa" => ["present", "regex:/^([1-9])([0-9]+)*$/", "nullable"], 
            "universidad_carrera_materia" => ["required", "regex:/^([1-9])([0-9]+)*$/"], 
            "universidad_carrera_optativa" => ["present", "regex:/^([1-9])([0-9]+)*$/", "nullable"], 
            "calificacion" => ["required", "regex:/^(10((.0){0,1}))|([6-9]((.[0-9]){0,1}))$/"]
        ];
    }

    public function messages(){
        return [
            "dictamen.required" => "El atributo :attribute es necesario",
            "dictamen.regex" => "El (:attribute) no es valido", 

            
            "universidad_carrera_materia.required" => "El atributo :attribute es necesario", 
            "universidad_carrera_materia.regex" => "El (:attribute) no es valido", 


            "universidad_carrera_optativa.present" => "El atributo :attribute es necesario",
            "universidad_carrera_optativa.regex" => "El formato del campo (:attribute) no es valido",


            "uabjo_materia.required" => "El atributo :attribute es necesario", 
            "uabjo_materia.regex" => "El (:attribute) no es valido", 


            "uabjo_optativa.present" => "El atributo :attribute es necesario", 
            "uabjo_optativa.regex" => "El formato del campo (:attribute) no es valido", 


            "calificacion.required" => "El atributo :attribute es necesario",
            "calificacion.regex" => "El (:attribute) no es valido"
        ];
    }

    public function attributes(){
        return [
            "dictamen" => "Clave Predictamen", 
            "universidad_carrera_materia" => "Materia de la Universidad", 
            "universidad_carrera_optativa" => "Optativa de la Universidad", 
            "uabjo_materia" => "Materia de la Escuela de Ciencias", 
            "uabjo_optativa" => "Optativa de la Escuela de Ciencias", 
            "calificacion" => "Calificación de la materia"
        ];
    }
}
