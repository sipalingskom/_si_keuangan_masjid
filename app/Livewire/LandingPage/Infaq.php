<?php

namespace App\Livewire\LandingPage;

use App\Models\Infaq as ModelsInfaq;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Infaq extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(ModelsInfaq::where('status', '1'))
            ->columns([
                TextColumn::make('nama')
                    ->formatStateUsing(fn($state) => ucwords($state))
                    ->searchable(),
                TextColumn::make('kategori')
                    ->formatStateUsing(fn($state) => ucwords($state))
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'masjid' => 'danger',
                        'sosial' => 'success'
                    })
                    ->searchable(),
                TextColumn::make('type')
                    ->formatStateUsing(fn($state) => ucwords($state))
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'pengeluaran' => 'danger',
                        'pemasukan' => 'success'
                    })
                    ->searchable(),
                TextColumn::make('jumlah')
                    ->prefix('Rp ')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('tanggal')
                    ->date('d M Y')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('type')
                    ->options([
                        'pemasukan' => 'Pemasukan',
                        'pengeluaran' => 'Pengeluaran',
                    ])
            ]);
    }

    public function render()
    {
        $pemasukanInfaq = ModelsInfaq::where('type', 'pemasukan')->pluck('jumlah')->toArray();
        $pengeluaranInfaq = ModelsInfaq::where('type', 'pengeluaran')->pluck('jumlah')->toArray();
        $totalInfaq = array_sum($pemasukanInfaq) - array_sum($pengeluaranInfaq);

        return view('livewire.landing-page.infaq', compact('pemasukanInfaq', 'pengeluaranInfaq', 'totalInfaq'));
    }
}
