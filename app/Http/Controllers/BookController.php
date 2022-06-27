<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class BookController extends Controller
{
    public function index(): View
    {
        $books = Book::with('readLogs')
            ->whereUserId(auth()->id())
            ->orderBy('is_finished')
            ->latest()
            ->paginate();

        return view('books.index', compact('books'));
    }

    public function create(): View
    {
        return view('books.create');
    }

    public function store(StoreBookRequest $request): RedirectResponse
    {
        $book = Book::create([
            ...$request->get('book'),
            'user_id' => auth()->id(),
        ]);

        flash(__('Book created.'))->success();

        return redirect(route('books.show', $book));
    }

    public function show(Book $book): View
    {
        $book->load([
            'readLogs' => function ($query) {
                $query->orderBy('date', 'desc')->latest();
            }
        ]);

        return view('books.show', compact('book'));
    }

    public function edit(Book $book): View
    {
        return view('books.edit', compact('book'));
    }

    public function update(UpdateBookRequest $request, Book $book): RedirectResponse
    {
        $book->update($request->get('book'));

        flash(__('Book updated.'))->info();

        return redirect(route('books.show', $book));
    }

    public function destroy(Book $book): RedirectResponse
    {
        $book->delete();

        return redirect(route('books.index'));
    }
}
