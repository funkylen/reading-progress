<?php

namespace App\Http\Requests;

use App\Http\Requests\Traits\LocalizedAttributes;
use Illuminate\Foundation\Http\FormRequest;

class UpdateReadLogRequest extends FormRequest
{
    use LocalizedAttributes;

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'read_log.pages_count' => 'required|integer|min:1',
            'read_log.date' => 'required|date',
        ];
    }
}
