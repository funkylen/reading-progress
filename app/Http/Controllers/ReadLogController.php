<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReadLogRequest;
use App\Http\Requests\UpdateReadLogRequest;
use App\Models\Book;
use App\Models\ReadLog;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ReadLogController extends Controller
{
    public function create(Book $book): View
    {
        if (session()->has('errors')) {
            flash(__("Can't add read log."))->error();
        }

        return view('read_logs.create', compact('book'));
    }

    public function store(StoreReadLogRequest $request, Book $book): RedirectResponse
    {
        $book->readLogs()->create($request->get('read_log'));

        flash(__('Read log created.'))->success();

        return redirect(route('books.show', $book));
    }

    public function edit(Book $book, ReadLog $readLog): View
    {
        return view('read_logs.edit', compact('book', 'readLog'));
    }

    public function update(UpdateReadLogRequest $request, Book $book, ReadLog $readLog): RedirectResponse
    {
        $readLog->update($request->get('read_log'));

        flash(__('Read log updated.'))->info();

        return redirect(route('books.show', $book));
    }

    public function destroy(Book $book, ReadLog $readLog): RedirectResponse
    {
        $readLog->delete();

        return redirect(route('books.show', $book));
    }
}
