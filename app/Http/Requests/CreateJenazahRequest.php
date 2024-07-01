<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateJenazahRequest extends FormRequest
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
            'nik' => 'required|string|max:16',
            'tempat_lahir' => 'required|string|max:50',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'status_kawin' => 'required|in:Kawin,Belum Kawin',
            'kewarganegaraan' => 'required|string|max:50',
            'provinsi' => 'required|string|max:50',
            'kabupaten' => 'required|string|max:50',
            'kecamatan' => 'required|string|max:50',
            'kelurahan' => 'required|string|max:50',
            'rt' => 'required|integer',
            'rw' => 'required|integer',
            'alamat_lengkap' => 'required|string',
            'alamat_singkat' => 'required|string',
            'agama' => 'required|in:Islam,Kristen,Katholik,Hindu,Buddha,Konghucu',
            'pendidikan' => 'required|string|max:50',
            'pekerjaan' => 'required|string|max:50'
        
        ];
    }
}
