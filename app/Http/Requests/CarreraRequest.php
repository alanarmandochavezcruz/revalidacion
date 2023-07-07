<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarreraRequest extends FormRequest
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
        $this->request->add(['id_universidad' => $this->id_universidad]);

        return [
            "id_universidad" => ["required", "regex:/^([1-9])([0-9]+)*$/"],
            "nombre" => ["required", "min:1", "max:255", "regex:/^([a-zA-ZáéíóúüñÁÉÍÓÚÜÑ]+)(\s[a-zA-ZáéíóúüñÁÉÍÓÚÜÑ]+)*$/"]
        ];
    }

    public function messages()
    {
        return [
            "id_universidad.required" => "El :attribute es requerido",
            "id_universidad.regex" => "El (:attribute) no es valido",

            "nombre.required" => "El :attribute es requerido",
            "nombre.min" => "El (:attribute) debe tener una longitud minima de 1",
            "nombre.max" => "El (:attribute) debe tener una longitud maxima de 255",
            "nombre.regex" => "El (:attribute) solo acepta letras  y espacios"
        ];
    }

    public function attributes()
    {
        return [
            "id_universidad" => "Nombre de la carrera",
            "nombre" => "Nombre de la carrera"
        ];
    }
}
