<?php

namespace App\View\Components\Form;

use Illuminate\Contracts\View\View;

class Text extends InputComponent
{
    public function __construct(
        public string $name,
        public ?string $label,
        public ?string $defaultValue = null,
        public ?string $placeholder = null
    ) {
        $this->label = $label ?? $name;
    }

    public function render(): View
    {
        return view('components.form.text', [
            'name' => $this->name,
            'label' => $this->label,
            'defaultValue' => $this->defaultValue,
            'placeholder' => $this->placeholder,
            'errorName' => $this->getErrorName(),
        ]);
    }
}
