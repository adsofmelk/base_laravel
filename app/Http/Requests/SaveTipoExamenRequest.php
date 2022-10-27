<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveTipoExamenRequest extends FormRequest
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
        $nombreUnique = ($this->isMethod('POST')) ? '|unique:tipo_examen' : '' ;
        return [
            'nombre' => 'required'.$nombreUnique.'|max:100',
            'precio' => 'required',
            'grupos_examenes_id' => 'required',
        ];
    }
}
