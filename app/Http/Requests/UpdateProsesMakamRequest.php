<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProsesMakamRequest extends FormRequest
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
            
            'id_jenazah' => 'sometimes|string|max:10|exists:jenazah,id_jenazah',
            'id_lokasi' => 'sometimes|string|max:10|exists:lokasi,id_lokasi',
            'id_biaya' => 'sometimes|string|max:10|exists:biaya,id_biaya',
            'id_pekerja' => 'sometimes|string|max:10|exists:pekerja,id_pekerja',
            'tanggal_pemakaman' => 'sometimes|date',
            'jumlah_pekerja' => 'sometimes|integer'
        
        ];
    }
}
