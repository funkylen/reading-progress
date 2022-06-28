<?php

namespace App\View\Components\Form;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;

class Number extends InputComponent
{
    public string $label;
    public ?int $defaultValue;
    public ?string $placeholder;

    public function __construct(
        string $name,
        string $label = null,
        int $defaultValue = null,
        string $placeholder = null
    ) {
        $this->name = $name;
        $this->label = $label ?? $name;
        $this->defaultValue = $defaultValue;
        $this->placeholder = $placeholder;
    }

    public function render(): View
    {
        return view('components.form.number', [
            'name' => $this->name,
            'label' => $this->label,
            'defaultValue' => $this->defaultValue,
            'placeholder' => $this->placeholder,
            'errorName' => $this->getErrorName(),
        ]);
    }
}
