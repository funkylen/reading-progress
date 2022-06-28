<?php

namespace App\Http\Requests;

use App\Http\Requests\Traits\LocalizedAttributes;
use Illuminate\Foundation\Http\FormRequest;

class StoreReadLogRequest extends FormRequest
{
    use LocalizedAttributes;

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'current_page' => 'required|integer|min:1',
            'read_log.date' => 'required|date',
        ];
    }

    public function attributes(): array
    {
        $attributes = [
            'current_page' => __('read_log.current_page'),
        ];

        return array_merge($this->localizedAttributes(), $attributes);
    }
}
