<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InventarisRequest extends FormRequest
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
            'kode_inventaris' => 'required|max:5',
            'kondisi' => 'required',
            'keterangan' => 'required',
            'jumlah' => 'required',
            'gambar' => 'required|mimes:jpeg,jpg,png,svg|max:2048',
            'id_ruang' => 'required',
        ];
    }
}
