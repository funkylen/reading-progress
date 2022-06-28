<?php

namespace App\View\Components\Form;

use Illuminate\Support\Str;
use Illuminate\View\Component;

abstract class InputComponent extends Component
{
    public string $name;

    protected function getErrorName(): string
    {
        if (!str_contains($this->name, '[')) {
            return $this->name;
        }

        $entityName = Str::before($this->name, '[');
        $fieldName = Str::between($this->name, '[', ']');

        return implode('.', [$entityName, $fieldName]);
    }
}
