<?php

namespace App\Filament\Resources\ReadLogResource\Pages;

use App\Filament\Resources\ReadLogResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditReadLog extends EditRecord
{
    protected static string $resource = ReadLogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
