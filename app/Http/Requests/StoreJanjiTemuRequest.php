<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJanjiTemuRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'dokter_id' => 'required|exists:dokter,id',
            'hewan_id' => 'required|exists:hewan,id',
            'tanggal_janji' => 'required|date|after:now',
        ];
    }
}
