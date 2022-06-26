<?php

namespace App\View\Components\Form;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Text extends Component
{
    public string $name;
    public string $label;
    public ?string $defaultValue;

    public function __construct(string $name, string $label = null, string $defaultValue = null)
    {
        $this->name = $name;
        $this->label = $label ?? $name;
        $this->defaultValue = $defaultValue;
    }

    public function render(): View
    {
        return view('components.form.text', [
            'name' => $this->name,
            'label' => $this->label,
            'defaultValue' => $this->defaultValue,
        ]);
    }
}
