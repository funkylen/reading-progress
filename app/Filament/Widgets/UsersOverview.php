<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UsersOverview extends BaseWidget
{
    protected function getColumns(): int
    {
        return 2;
    }

    protected function getStats(): array
    {
        return [
            Stat::make(
                label: 'User registered',
                value: User::count(),
            ),
            Stat::make(
                label: 'User registered this month',
                value: User::where('created_at', '>=', today()->subMonth())->count(),
            ),
        ];
    }
}
