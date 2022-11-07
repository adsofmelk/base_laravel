<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveAgendamientoRequest extends FormRequest
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
        $validaFecha = ($this->isMethod('POST')) ? '|after:' . date('Y-m-d') : '';
        return [
            'fecha' => 'required' . $validaFecha,
            'estado' => '',
            'empresas_id' => '',
            'pacientes_id' => '',
            'tipoestados_agendamientos_id' => '',
        ];
    }
}
