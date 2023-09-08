<?php

namespace App\Filament\Widgets;

use App\Models\ReadLog;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Collection;

class ReadLogsOverview extends BaseWidget
{
    private function getReadLogs(Carbon $from): Collection
    {
        return ReadLog::where('date', '>=', $from->format('Y-m-d'))
            ->latest()
            ->get();
    }

    protected function getStats(): array
    {
        $readWeek = $this->getReadLogs(today()->subWeek());
        $readMonth = $this->getReadLogs(today()->subMonth());

        return [
            Stat::make(
                label: 'Pages read today',
                value: $this->getReadLogs(today())->sum('pages_count'),
            ),
            Stat::make(
                label: 'Pages read last week',
                value: $readWeek->sum('pages_count'),
            ),
            Stat::make(
                label: 'Pages read last month',
                value: $readMonth->sum('pages_count'),
            ),
        ];
    }
}
