<?php

namespace App\Filament\Resources\ReadLogResource\Pages;

use App\Filament\Resources\ReadLogResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListReadLogs extends ListRecords
{
    protected static string $resource = ReadLogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
