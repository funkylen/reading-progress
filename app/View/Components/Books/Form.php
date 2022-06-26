<?php

namespace App\View\Components\Books;

use App\Models\Book;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Form extends Component
{
    public string $label;
    public string $buttonLabel;
    public array $formOptions;
    public ?Book $book;

    public function __construct(string $label, string $buttonLabel, array $formOptions, ?Book $book = null)
    {
        $this->label = $label;
        $this->book = $book;
        $this->formOptions = $formOptions;
        $this->buttonLabel = $buttonLabel;
    }

    public function render(): View
    {
        return view('components.books.form', [
            'label' => $this->label,
            'book' => $this->book,
            'buttonLabel' => $this->buttonLabel,
            'formOptions' => $this->formOptions,
        ]);
    }
}
