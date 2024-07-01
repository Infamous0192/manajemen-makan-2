<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBiayaRequest extends FormRequest
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

            'nama_pekerjaan' => 'required|string|max:50',
            'nama_paket' => 'required|string|max:50',
            'jumlah_pekerja' => 'required|integer',
            'fasilitas' => 'required|string|max:50',
            'harga' => 'required|integer'

        ];
    }
}
