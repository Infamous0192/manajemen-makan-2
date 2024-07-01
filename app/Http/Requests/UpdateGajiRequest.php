<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGajiRequest extends FormRequest
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
            
            'id_pekerja' => 'sometimes|string|max:10|exists:pekerja,id_pekerja',
            'bulan_gaji' => 'sometimes|date',
            'tanggal_gaji' => 'sometimes|date'
        
        ];
    }
}
