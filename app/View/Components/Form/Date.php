<?php

namespace App\View\Components\Form;

use Carbon\Carbon;
use Illuminate\Contracts\View\View;

class Date extends InputComponent
{
    public string $label;
    public Carbon $defaultDate;

    public function __construct(string $name, string $label = null, Carbon $defaultDate = null)
    {
        $this->name = $name;
        $this->label = $label ?? $name;
        $this->defaultDate = $defaultDate ?? now();
    }

    public function render(): View
    {
        return view('components.form.date', [
            'name' => $this->name,
            'label' => $this->label,
            'defaultDate' => $this->defaultDate,
            'errorName' => $this->getErrorName(),
        ]);
    }
}
