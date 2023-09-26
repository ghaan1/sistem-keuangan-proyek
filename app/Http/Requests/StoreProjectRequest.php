<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'waktu_mulai' => 'required|date',
            'waktu_selesai' => 'required|date|after_or_equal:waktu_mulai',
            'total_pekerja' => 'required|integer',
            'nama_mandor' => 'required|exists:pekerja,id', // Assuming you are referencing a User model
            'nilai_project' => 'required|numeric',
            'foto' => 'required|image|max:2048', // Assuming a maximum of 2MB for the image.
            'status' => 'required|in:Belum Selesai,Selesai',
        ];
    }
}
