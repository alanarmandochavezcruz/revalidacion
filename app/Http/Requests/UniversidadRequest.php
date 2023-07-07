<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UniversidadRequest extends FormRequest
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
        return [
            "nombre" => ["required", "min:1", "max:255", "regex:/^([a-zA-ZáéíóúüñÁÉÍÓÚÜÑ]+)(\s[a-zA-ZáéíóúüñÁÉÍÓÚÜÑ]+)*$/"]
        ];
    }

    public function messages(){
        return [
            "nombre.required" => "El :attribute es requerido",
            "nombre.min" => "El (:attribute) debe tener una longitud de minima de 1 caracter(es)",
            "nombre.max" => "El (:attribute) debe tener una longitud de maxima de 255 caracter(es)",
            "nombre.regex" => "El (:attribute) solo acepta letras y espacio"
        ];
    }

    public function attributes(){
        return[
            "nombre" => "Nombre de la Universidad"
        ];
    }
}
