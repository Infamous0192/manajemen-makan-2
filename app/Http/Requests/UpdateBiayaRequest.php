<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBiayaRequest extends FormRequest
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
            
            'nama_pekerjaan' => 'sometimes|string|max:50',
            'nama_paket' => 'sometimes|string|max:50',
            'jumlah_pekerja' => 'sometimes|integer',
            'fasilitas' => 'sometimes|string|max:50',
            'harga' => 'sometimes|integer'
        
        ];
    }
}
