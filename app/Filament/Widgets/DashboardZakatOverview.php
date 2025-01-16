<?php

namespace App\Filament\Widgets;

use App\Models\Zakat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardZakatOverview extends BaseWidget
{
    protected ?string $heading = 'Informasi Zakat';

    protected function getStats(): array
    {
        $pemasukanZakat = Zakat::where('type', 'pemasukan')->where('status', '1')->pluck('jumlah')->toArray();
        $pengeluaranZakat = Zakat::where('type', 'pengeluaran')->where('status', '1')->pluck('jumlah')->toArray();
        $totalZakat = array_sum($pemasukanZakat) - array_sum($pengeluaranZakat);

        return [
            Stat::make('Total Zakat', 'Rp ' . number_format($totalZakat, 0, 0)),
            Stat::make('Pemasukan Zakat', 'Rp ' . number_format(array_sum($pemasukanZakat), 0, 0)),
            Stat::make('Pengeluaran Zakat', 'Rp ' . number_format(array_sum($pengeluaranZakat), 0, 0)),
        ];
    }
}
