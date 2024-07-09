<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDaftarRequest extends FormRequest
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
            
            'nama' => 'sometimes|string|max:50',
            'no_hp' => 'sometimes|string|max:12',
            'tanggal_meninggal' => 'sometimes|date',
            'id_jenazah' => 'sometimes|string|max:10|exists:jenazah,id_jenazah'
        
        ];
    }
}