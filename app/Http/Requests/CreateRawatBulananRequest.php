<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRawatBulananRequest extends FormRequest
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
            'nama_jenazah' => 'required|string',
            'id_lokasi' => 'required|string|max:10|exists:lokasi,id_lokasi',
            'id_blok' => 'required|string|max:10|exists:blok,id_blok',
        ];
    }
}
