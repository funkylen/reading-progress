<?php

namespace App\Orchid\Screens;

use App\Models\Feedback;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;

class FeedbackListScreen extends Screen
{
    public function query(): iterable
    {
        return [
            'feedback' => Feedback::latest()->paginate(),
        ];
    }

    public function name(): ?string
    {
        return 'Обратная связь';
    }

    public function commandBar(): iterable
    {
        return [];
    }

    public function layout(): iterable
    {
        return [
            Layout::table('feedback', [
                TD::make('id', 'ID'),

                TD::make('name', 'Name'),

                TD::make('email', 'Email'),

                TD::make('content', 'Content')->render(function (Feedback $item) {
                    return Str::limit(htmlspecialchars($item->content));
                }),

                TD::make('created_at', 'Created')->render(function (Feedback $item) {
                    return $item->created_at->format('d.m.Y H:i:s');
                }),

                TD::make('actions')->render(function ($item) {
                    return Link::make('Открыть')->route('platform.feedback.show', $item);
                })
            ]),
        ];
    }
}
