<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UabjoCarreraRequest extends FormRequest
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
            "nombre.required" => "Es necesario agregar el campo (:attribute)",
            "nombre.min" => "El (:attribute) debe tener una longitud minima de 1",
            "nombre.max" => "El (:attribute) debe tener una longitud maxima de 255",
            "nombre.regex" => "El (:attribute) solo acepta letras y un espacios"
        ];
    }

    public function attributes(){
        return [
            "nombre" => "Nombre de la Carrera"
        ];
    }
}
