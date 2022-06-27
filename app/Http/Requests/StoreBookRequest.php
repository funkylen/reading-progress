<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'book.title' => 'required|string',
            'book.author' => 'required|string',
            'book.start_page' => 'required|integer|min:0',
            'book.pages_count' => 'required|integer|min:1',
        ];
    }
}
