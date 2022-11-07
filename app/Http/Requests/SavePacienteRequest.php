<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SavePacienteRequest extends FormRequest
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
        $documentoUnique = ($this->isMethod('POST')) ? '|unique:pacientes' : '' ;
        return [
            'nombre1' => 'required|max:45',
            'nombre2' => 'max:45',
            'apellido1' => 'required|max:45',
            'apellido2' => 'max:45',
            'documento' => 'required'.$documentoUnique.'|max:45',
            'telefono' => 'required|max:20',
            'email' => 'required|email:rfc|max:100',
            'tipo_documentos_id' => '',
        ];
    }
}
