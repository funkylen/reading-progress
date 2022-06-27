<?php

namespace App\View\Components\Book;

use App\Models\Book;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Progress extends Component
{
    public Book $book;

    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    public function render(): View
    {
        return view('components.book.progress', [
            'percent' => $this->book->getProgressPercent(),
            'value' => $this->book->getCurrentPage(),
            'max' => $this->book->pages_count,
            'content' => $this->book->is_finished ? '&check;' : '',
        ]);
    }
}
