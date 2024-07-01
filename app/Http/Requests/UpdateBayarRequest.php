<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBayarRequest extends FormRequest
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
            
            'id_daftar' => 'sometimes|integer|exists:daftar,id_daftar',
            'id_jenazah' => 'sometimes|string|max:10|exists:jenazah,id_jenazah',
            'id_lokasi' => 'sometimes|string|max:10|exists:lokasi,id_lokasi',
            'id_biaya' => 'sometimes|string|max:10|exists:biaya,id_biaya',
            'id_harga' => 'sometimes|string|max:10|exists:harga_makam,id_harga',
            'tanggal_bayar' => 'sometimes|date',
            'jenis_bayar' => 'sometimes|in:cash,transfer',
            'jumlah' => 'sometimes|integer',
            'status' => 'sometimes|in:terbayar,belum'
        
        ];
    }
}
