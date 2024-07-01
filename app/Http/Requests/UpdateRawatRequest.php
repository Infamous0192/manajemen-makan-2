<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRawatRequest extends FormRequest
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
            
            'id_lokasi' => 'sometimes|string|max:10|exists:lokasi,id_lokasi',
            'id_jenazah' => 'sometimes|string|max:10|exists:jenazah,id_jenazah',
            'id_pekerja' => 'sometimes|string|max:10|exists:pekerja,id_pekerja',
            'jumlah_pekerja' => 'sometimes|integer',
            'jumlah_perawatan' => 'sometimes|integer',
            'tanggal_rawat' => 'sometimes|date'
        
        ];
    }
}
