<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRawatRequest extends FormRequest
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
            
            'id_lokasi' => 'required|string|max:10|exists:lokasi,id_lokasi',
            'id_jenazah' => 'required|string|max:10|exists:jenazah,id_jenazah',
            'id_pekerja' => 'required|string|max:10|exists:pekerja,id_pekerja',
            'jumlah_pekerja' => 'required|integer',
            'jumlah_perawatan' => 'required|integer',
            'tanggal_rawat' => 'required|date'
        
        ];
    }
}
