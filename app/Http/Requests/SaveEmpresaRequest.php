<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveEmpresaRequest extends FormRequest
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
        $nitUnique = ($this->isMethod('POST')) ? '|unique:empresas' : '' ;
        $nombreUnique = ($this->isMethod('POST')) ? '|unique:empresas' : '' ;
        return [
            'nombre' => 'required'.$nitUnique.'|max:100',
            'nit' => 'required'.$nitUnique.'|max:15',
            'telefono' => 'required|max:20',
            'email' => 'required|email:rfc|max:100',
            'nombre_contacto' => 'max:100',
            'direccion' => 'max:255',
        ];
    }
}
