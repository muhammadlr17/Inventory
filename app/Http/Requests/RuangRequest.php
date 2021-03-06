<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RuangRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    /* public function authorize()
    {
        return false;
    } */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nama' => 'required',
            'kode_ruang' => 'required|max:5',
            'keterangan' => 'required'
        ];
    }
}
