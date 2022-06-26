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
        $books = Book::whereUserId(auth()->id())->latest()->paginate();

        return view('books.index', compact('books'));
    }

    public function create(): View
    {
        return view('books.create');
    }

    public function store(StoreBookRequest $request): RedirectResponse
    {
        $book = Book::create([
            ...$request->validated(),
            'user_id' => auth()->id(),
        ]);

        return redirect(route('books.show', $book));
    }

    public function show(Book $book): View
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book): View
    {
        return view('books.edit', compact('book'));
    }

    public function update(UpdateBookRequest $request, Book $book): RedirectResponse
    {
        $book->update($request->validated());

        return redirect(route('books.show', $book));
    }

    public function destroy(Book $book): RedirectResponse
    {
        $book->delete();

        return redirect(route('books.index'));
    }
}
