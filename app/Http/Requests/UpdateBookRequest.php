<?php

namespace App\Http\Requests;

use App\Http\Requests\Traits\LocalizedAttributes;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
{
    use LocalizedAttributes;

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'book.title' => 'required|string',
            'book.author' => 'required|string',
            'book.pages_count' => 'required|integer|min:1',
        ];
    }
}
