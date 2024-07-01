<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBayarRequest extends FormRequest
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

            'id_daftar' => 'required|integer|exists:daftar,id_daftar',
            'id_jenazah' => 'required|string|max:10|exists:jenazah,id_jenazah',
            'id_lokasi' => 'required|string|max:10|exists:lokasi,id_lokasi',
            'id_biaya' => 'required|string|max:10|exists:biaya,id_biaya',
            'id_harga' => 'required|string|max:10|exists:harga_makam,id_harga',
            'tanggal_bayar' => 'required|date',
            'jenis_bayar' => 'required|in:cash,transfer',
            'jumlah' => 'required|integer',
            'status' => 'required|in:terbayar,belum'

        ];
    }
}
