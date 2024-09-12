<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class TipoReporteRequest extends FormRequest
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
     * @return array
     */
    public function rules(Request $request)
    {
        if ($request->id) {
            return [
                'Num' => 'required',
                'TipoReporte' => 'required|max:250',
                'Modulo' => 'required|max:250',
                'Titulo' => 'required|max:800',
                'NombreArchivo' => 'required|max:800',
                'Parametros' => 'required',
                'Definicion' => 'required',
                'Origen' => 'required|max:255'
            ];
        } else {
            return [
                'Num' => 'required',
                'TipoReporte' => 'required|max:250|unique:TipoReporte',
                'Modulo' => 'required|max:250',
                'Titulo' => 'required|max:800',
                'NombreArchivo' => 'required|max:800',
                'Parametros' => 'required',
                'Definicion' => 'required',
                'Origen' => 'required|max:255'
            ];
        }
    }
}
