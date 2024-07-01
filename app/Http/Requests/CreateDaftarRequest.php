<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateDaftarRequest extends FormRequest
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
            
            'nama' => 'required|string|max:50',
            'no_hp' => 'required|string|max:12',
            'tanggal_meninggal' => 'required|date',
            'id_jenazah' => 'required|string|max:10|exists:jenazah,id_jenazah'
        
        ];
    }
}
