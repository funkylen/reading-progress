<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFeedbackRequest;
use App\Models\Feedback;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class FeedbackController extends Controller
{
    public function create(): View
    {
        return view('feedback.create');
    }

    public function store(StoreFeedbackRequest $request): RedirectResponse
    {
        Feedback::create($request->validated('feedback'));

        flash(__('feedback.created'))->success();

        return back();
    }
}
