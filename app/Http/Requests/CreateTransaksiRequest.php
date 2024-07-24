<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTransaksiRequest extends FormRequest
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
            'judul' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'jenis' => 'required|in:pengeluaran,pemasukan',
            'jumlah' => 'required|numeric|min:0',
            'tanggal' => 'required|date',
        ];
    }
}
