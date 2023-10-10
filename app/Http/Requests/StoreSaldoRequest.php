<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSaldoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'project_id' => 'required|exists:project,id',
            'saldo_type' => 'required|in:saldo_project,piutang_pengusaha',
            'amount' => 'required|numeric|min:0',
        ];
    }
}
