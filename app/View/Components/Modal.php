<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modal extends Component
{
    public string $id;
    public string $title;
    public string $message;
    public string $submitBtnType;
    public string $submitBtnTitle;

    public function __construct(
        string $id,
        string $title,
        string $message,
        string $submitBtnType = 'primary',
        ?string $submitBtnTitle = null,
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->message = $message;
        $this->submitBtnType = $submitBtnType;
        $this->submitBtnTitle = $submitBtnTitle ?? __('Apply');
    }

    public function render(): View
    {
        return view('components.modal', [
            'id' => $this->id,
            'title' => $this->title,
            'message' => $this->message,
            'submitButtonType' => $this->submitBtnType,
            'submitButtonTitle' => $this->submitBtnTitle,
        ]);
    }
}
