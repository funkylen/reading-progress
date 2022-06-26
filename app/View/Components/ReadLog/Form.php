<?php

namespace App\View\Components\ReadLog;

use App\Models\Book;
use App\Models\ReadLog;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Form extends Component
{
    public string $label;
    public string $buttonLabel;
    public array $formOptions;
    public ?ReadLog $readLog;
    public ?Book $book;

    public function __construct(
        string $label,
        string $buttonLabel,
        array $formOptions,
        ?ReadLog $readLog = null,
        ?Book $book = null
    ) {
        $this->label = $label;
        $this->readLog = $readLog;
        $this->book = $book;
        $this->formOptions = $formOptions;
        $this->buttonLabel = $buttonLabel;
    }

    public function render(): View
    {
        return view('components.read-log.form', [
            'label' => $this->label,
            'readLog' => $this->readLog,
            'book' => $this->book,
            'buttonLabel' => $this->buttonLabel,
            'formOptions' => $this->formOptions,
        ]);
    }
}
