<?php

namespace App\View\Components\Book;

use App\Models\Book;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{
    public function __construct(public readonly Book $book, public readonly bool $showProgress = true)
    {
    }

    public function render(): View
    {
        return view('components.book.card', [
            'book' => $this->book,
            'showProgress' => $this->showProgress,
        ]);
    }
}
