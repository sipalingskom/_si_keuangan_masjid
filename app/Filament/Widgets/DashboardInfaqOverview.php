<?php

namespace App\Filament\Widgets;

use App\Models\Infaq;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardInfaqOverview extends BaseWidget
{
    protected ?string $heading = 'Informasi Infaq';

    protected function getStats(): array
    {
        $pemasukanInfaq = Infaq::where('type', 'pemasukan')->where('status', '1')->pluck('jumlah')->toArray();
        $pengeluaranInfaq = Infaq::where('type', 'pengeluaran')->where('status', '1')->pluck('jumlah')->toArray();
        $totalInfaq = array_sum($pemasukanInfaq) - array_sum($pengeluaranInfaq);

        return [
            Stat::make('Total Infaq', 'Rp ' . number_format($totalInfaq, 0, 0)),
            Stat::make('Pemasukan Infaq', 'Rp ' . number_format(array_sum($pemasukanInfaq), 0, 0)),
            Stat::make('Pengeluaran Infaq', 'Rp ' . number_format(array_sum($pengeluaranInfaq), 0, 0)),
        ];
    }
}
