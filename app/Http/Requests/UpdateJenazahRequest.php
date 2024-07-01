<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJenazahRequest extends FormRequest
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
            'nik' => 'sometimes|string|max:16',
            'tempat_lahir' => 'sometimes|string|max:50',
            'tanggal_lahir' => 'sometimes|date',
            'jenis_kelamin' => 'sometimes|in:L,P',
            'status_kawin' => 'sometimes|in:Kawin,Belum Kawin',
            'kewarganegaraan' => 'sometimes|string|max:50',
            'provinsi' => 'sometimes|string|max:50',
            'kabupaten' => 'sometimes|string|max:50',
            'kecamatan' => 'sometimes|string|max:50',
            'kelurahan' => 'sometimes|string|max:50',
            'rt' => 'sometimes|integer',
            'rw' => 'sometimes|integer',
            'alamat_lengkap' => 'sometimes|string',
            'alamat_singkat' => 'sometimes|string',
            'agama' => 'sometimes|in:Islam,Kristen,Katholik,Hindu,Buddha,Konghucu',
            'pendidikan' => 'sometimes|string|max:50',
            'pekerjaan' => 'sometimes|string|max:50'
        
        ];
    }
}
