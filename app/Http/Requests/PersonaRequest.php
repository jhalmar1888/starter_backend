<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class PersonaRequest extends FormRequest
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
                'Nombres' => 'required|regex:/(^[A-Za-z ]+$)+/|max:50',
                'ApellidoPaterno' => 'required|alpha|max:50',
                'ApellidoMaterno' => 'nullable|max:80',
                'email' => 'required|email',
            ];
        } else {
            return [
                'Nombres' => 'required|regex:/(^[A-Za-z ]+$)+/|max:50',
                'ApellidoPaterno' => 'required|alpha|max:50',
                'ApellidoMaterno' => 'nullable|max:50',
                'email' => 'required|email|unique:Persona',
            ];
        }
    }
}
