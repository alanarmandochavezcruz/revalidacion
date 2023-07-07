<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DictamenRegistroRequest extends FormRequest
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
        $this->request->add(['id_alumno'=>$this->id_alumno]);

        


        if( $this->method() == "POST" ) {
            if(!$this->request->has('estado')){
                $this->request->add(['estado'=>'pendiente']);
            }
            if(!$this->request->has('fecha_aprobacion')){
                $this->request->add(['fecha_aprobacion'=>null]);
            }
        }

        return [
            "id_alumno" => ["required", "regex:/^([1-9])([0-9]+)*$/"],
            "clave" => ["required", "min:1", "max:40", "regex:/^([0-9A-Z]+)(\/[0-9A-Z]+)*$/"],
            "periodo_inicio" => ["required", "regex:/^([1-2][0-9][0-9][0-9])$/"],
            "periodo_fin" => ["required", "regex:/^([1-2][0-9][0-9][0-9])$/"],
            "fecha_aprobacion" => ["present", "date", "nullable"],
            "semestre_alumno" => ["required", "min:5", "max:7", "regex:/^([a-zéA-ZÉ]+)$/"],
            "director_uabjo" => ["required", "min:1", "max:255", "regex:/^([a-zA-ZáéíóúüñÁÉÍÓÚÜÑ.]+)(\s[a-zA-ZáéíóúüñÁÉÍÓÚÜÑ.]+)*$/"],
            "coordinador_uabjo" => ["required", "min:1", "max:255", "regex:/^([a-zA-ZáéíóúüñÁÉÍÓÚÜÑ.]+)(\s[a-zA-ZáéíóúüñÁÉÍÓÚÜÑ.]+)*$/"],
            "director_escolares" => ["required", "min:1", "max:255", "regex:/^([a-zA-ZáéíóúüñÁÉÍÓÚÜÑ.]+)(\s[a-zA-ZáéíóúüñÁÉÍÓÚÜÑ.]+)*$/"],
            "subdirector_escolares" => ["required", "min:1", "max:255", "regex:/^([a-zA-ZáéíóúüñÁÉÍÓÚÜÑ.]+)(\s[a-zA-ZáéíóúüñÁÉÍÓÚÜÑ.]+)*$/"],
            "secretaria_escolares" => ["required", "min:1", "max:255", "regex:/^([a-zA-ZáéíóúüñÁÉÍÓÚÜÑ.]+)(\s[a-zA-ZáéíóúüñÁÉÍÓÚÜÑ.]+)*$/"],
            "estado" => ["present", "regex:/^(pendiente|aprovado)$/"]
        ];
    }

    public function messages(){
        return [
            "id_alumno.required" => "Es necesario agregar el campo (:attribute)",
            "id_alumno.regex" => "El (:attribute) no es valido",

            "clave.required" => "Es necesario agregar el campo (:attribute)",
            "clave.min" => "El (:attribute) debe tener una longitud minima de 1 caracter(es)",
            "clave.max" => "El (:attribute) debe tener una longitud maxima de 40 caracter(es)",
            "clave.regex" => "El (:attribute) solo acepta (A-z 0-9 /)",


            "periodo_inicio.required" => "Es necesario agregar el campo (:attribute)", 
            "periodo_inicio.regex" => "El (:attribute) no es valido (1987, 2020, 2023, ...)",


            "periodo_fin.required" => "Es necesario agregar el campo (:attribute)", 
            "periodo_fin.regex" => "El (:attribute) no es valido (1987, 2020, 2023, ...)",


            "fecha_aprobacion.required" => "Es necesario agregar el campo (:attribute)",
            "fecha_aprobacion.date" => "El (:attribute) debe ser una fecha",


            "semestre_alumno.required" => "Es necesario agregar el campo (:attribute)",
            "semestre_alumno.min" => "El (:attribute) debe tener una longitud minima de 5 caracter(es)",
            "semestre_alumno.max" => "El (:attribute) debe tener una longitud maxima de 7 caracter(es)",
            "semestre_alumno.regex" => "El (:attribute) solo acepta letras (Séptimo, Octavo, ...etc)",


            "director_uabjo.required" => "Es necesario agregar el campo (:attribute)",
            "director_uabjo.regex" => "El (:attribute) solo acepta letras  y espacio",
            "director_uabjo.min" => "El (:attribute) debe tener una longitud minima de 1",
            "director_uabjo.max" => "El (:attribute) debe tener una longitud maxima de 255",


            "coordinador_uabjo.required" => "Es necesario agregar el campo (:attribute)",
            "coordinador_uabjo.regex" => "El (:attribute) solo acepta letras  y espacio",
            "coordinador_uabjo.min" => "El (:attribute) debe tener una longitud minima de 1",
            "coordinador_uabjo.max" => "El (:attribute) debe tener una longitud maxima de 255",


            "director_escolares.required" => "Es necesario agregar el campo (:attribute)",
            "director_escolares.regex" => "El (:attribute) solo acepta letras  y espacio",
            "director_escolares.min" => "El (:attribute) debe tener una longitud minima de 1",
            "director_escolares.max" => "El (:attribute) debe tener una longitud maxima de 255",


            "subdirector_escolares.required" => "Es necesario agregar el campo (:attribute)",
            "subdirector_escolares.regex" => "El (:attribute) solo acepta letras  y espacio",
            "subdirector_escolares.min" => "El (:attribute) debe tener una longitud minima de 1",
            "subdirector_escolares.max" => "El (:attribute) debe tener una longitud maxima de 255",


            "secretaria_escolares.required" => "Es necesario agregar el campo (:attribute)",
            "secretaria_escolares.regex" => "El (:attribute) solo acepta letras  y espacio",
            "secretaria_escolares.min" => "El (:attribute) debe tener una longitud minima de 1",
            "secretaria_escolares.max" => "El (:attribute) debe tener una longitud maxima de 255",
            
            "estado.present" => "Es necesario agregar el campo (:attribute)",
            "estado.regex" => "El (:attribute) solo puede ser (Pendiente|Aprovado)"
        ];
    }

    public function attributes(){
        return [
            "id_alumno" => "ID del Alumno",
            "clave" => "Clave del oficio",
            "periodo_inicio" => "Año de inicio del periodo",
            "periodo_fin" => "Año de fin del periodo",
            "fecha_aprobacion" => "Fecha de aprobacion del oficio",
            "semestre_alumno" => "Semestre del Alumno",
            "director_uabjo" => "Nombre del Director de la Escuela de Ciencias",
            "coordinador_uabjo" => "Nombre del Coordinador de la Escuela de Ciencias",
            "director_escolares" => "Nombre del Director de Servicios Escolares",
            "subdirector_escolares" => "Nombre del Subdirector de Servicios Escolares",
            "secretaria_escolares" => "Nombre del Secretarios de Servicios Escolares",
            "estado" => "Estado (pendiente|aprovado)" 
        ];
    }
}
