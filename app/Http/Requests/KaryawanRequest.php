<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KaryawanRequest extends FormRequest
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
    public function rules()
    {
        return [
            'nik' => ['required'],
            'nama' => ['required'],
            'tlpn' => ['required'],
            'email' => ['required'],
            'alamat' => ['required'],
            'username' => ['required'],
            'password' => ['required', 'confirmed','min:5']
        ];
    }
}
