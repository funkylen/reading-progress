<?php

namespace App\View\Components\Form;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    public string $title;
    public string $type;

    public function __construct(string $title, string $type = 'primary')
    {
        $this->title = $title;
        $this->type = $type;
    }

    public function render(): View
    {
        return view('components.form.button', [
            'title' => $this->title,
            'type' => $this->type,
        ]);
    }
}
