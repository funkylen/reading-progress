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
        $book->load('readLogs');

        return view('read_logs.create', compact('book'));
    }

    public function store(StoreReadLogRequest $request, Book $book): RedirectResponse
    {
        return \DB::transaction(function () use ($book, $request) {
            $book->load('readLogs');

            $readLog = $book->readLogs()->make($request->get('read_log'));

            $currentPage = (int)$request->get('current_page');

            if ($currentPage > $book->pages_count) {
                $message = __("read_log.error_current_page_over_book_pages_count");
                return back()->withErrors(['current_page' => $message]);
            }

            if ($currentPage <= $book->getCurrentPage()) {
                $message = __("read_log.pages_count_lower_than_current_page");
                return back()->withErrors(['current_page' => $message]);
            }

            $readLog->pages_count = $currentPage - $book->readLogs->sum('pages_count');

            $readLog->save();

            $book->touch();

            if ($currentPage === $book->pages_count) {
                $book->is_finished = true;
            }

            $book->save();

            flash(__('read_log.created'))->success();

            return redirect(route('books.show', $book));
        });
    }

    public function edit(Book $book, ReadLog $readLog): View
    {
        return view('read_logs.edit', compact('book', 'readLog'));
    }

    public function update(UpdateReadLogRequest $request, Book $book, ReadLog $readLog): RedirectResponse
    {
        $book->load('readLogs');

        $pagesLeft = $book->getPagesLeftCount() + $readLog->pages_count;

        $readLog->fill($request->get('read_log'));

        if ($readLog->pages_count > $pagesLeft) {
            $message = __("read_log.pages_count_over_book_pages_count");
            return back()->withErrors(['read_log.pages_count' => $message]);
        }

        $readLog->save();

        $book->is_finished = $book->pages_count === $book->readLogs()->sum('pages_count');
        $book->save();

        flash(__('read_log.updated'))->info();

        return redirect(route('books.show', $book));
    }

    public function destroy(Book $book, ReadLog $readLog): RedirectResponse
    {
        $readLog->delete();

        if ($book->is_finished) {
            $book->is_finished = false;
            $book->save();
        }

        return redirect(route('books.show', $book));
    }
}
