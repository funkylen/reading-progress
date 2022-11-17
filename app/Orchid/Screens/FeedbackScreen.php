<?php

namespace App\Orchid\Screens;

use App\Models\Feedback;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Radio;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;

class FeedbackScreen extends Screen
{
    public function query(Feedback $feedback): iterable
    {
        return [
            'name' => $feedback->name,
            'email' => $feedback->email,
            'content' => $feedback->content,
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
            Layout::rows([
                Input::make('name')
                    ->title('Name'),
                Input::make('email')
                    ->title('Email'),
                TextArea::make('content')
                    ->title('Content')
                    ->rows(12),

            ]),
        ];
    }
}
