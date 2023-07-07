<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlumnoRequest extends FormRequest
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
        $this->request->add(['id_carrera_universidad' => $this->id_universidad_carrera]);
        $this->request->add(['id_carrera_uabjo' => $this->id_uabjo_carrera]);

        return [
            "id_carrera_universidad" => ["required", "regex:/^([1-9])([0-9]+)*$/"],
            "id_carrera_uabjo" => ["required", "regex:/^([1-9])([0-9]+)*$/"],
            "curp" => ["required", "min:18", "max:18", "regex:/^([A-Z0-9]){18}$/"],
            "clave" => ["required", "min:6", "max:6", "regex:/^([a-zA-Z0-9]){6}$/"],
            "nombres" => ["required", "min:1", "max:255", "regex:/^([a-zA-ZáéíóúüñÁÉÍÓÚÜÑ]+)(\s[a-zA-ZáéíóúüñÁÉÍÓÚÜÑ]+)*$/"],
            "apellidos" => ["required", "min:1", "max:255", "regex:/^([a-zA-ZáéíóúüñÁÉÍÓÚÜÑ]+)(\s[a-zA-ZáéíóúüñÁÉÍÓÚÜÑ]+)*$/"],
            "sexo" => ["required", "regex:/^(hombre|mujer)$/"]
        ];
    }

    public function messages(){
        return [
            "id_carrera_universidad.required" => "Debe ingresar el atributo: :attribute",
            "id_carrera_universidad.regex" => "El (:attribute) no es valido",

            "id_carrera_uabjo.required" => "Debe ingresar el atributo: :attribute",
            "id_carrera_universidad.regex" => "El (:attribute) no es valido",
            
            "curp.required" => "Debe ingresar el atributo: :attribute",
            "curp.min" => "El (:attribute) debe tener una longitud minima de 18",
            "curp.max" => "El (:attribute) debe tener una longitud maxima de 18",
            "curp.regex" => "El (:attribute) solo acepta letras  y numeros",

            "clave.required" => "Debe ingresar el atributo: :attribute",
            "clave.min" => "El (:attribute) debe tener una longitud minima de 6",
            "clave.max" => "El (:attribute) debe tener una longitud maxima de 6",
            "clave.regex" => "El (:attribute) solo acepta letras  y numeros",
            
            "nombres.required" => "Debe ingresar el atributo: :attribute",
            "nombres.min" => "El (:attribute) debe tener una longitud minima de 1",
            "nombres.max" => "El (:attribute) debe tener una longitud maxima de 255",
            "nombres.regex" => "El (:attribute) solo acepta letras  y espacio",
            
            "apellidos.required" => "Debe ingresar el atributo: :attribute",
            "apellidos.min" => "El (:attribute) debe tener una longitud minima de 1",
            "apellidos.max" => "El (:attribute) debe tener una longitud maxima de 255",
            "apellidos.regex" => "El (:attribute) solo acepta letras  y espacio",
            
            "sexo.required" => "Debe ingresar el atributo: :attribute",
            "sexo.regex" => "El (:attribute) solo puede ser (Hombre|Mujer)"
        ];
    }

    public function attributes(){
        return [
            "id_carrera_universidad" => "Universidad y su Carrera",
            "id_carrera_uabjo" => "Carrera Cursada la Escuela de Ciencias",
            "curp" => "CURP del alumno(a)",
            "clave" => "Clave unica del alumno(a)",
            "nombres" => "Nombres del alumno(a)",
            "apellidos" => "Apellidos del alumno(a)",
            "sexo" => "Sexo (Hombre|Mujer) del alumno(a)"
        ];
    }
}
