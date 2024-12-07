<?php

namespace App\Livewire;

use App\Models\Zakat;
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

class ListZakat extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Zakat::where('status', '1'))
            ->columns([
                TextColumn::make('nama')
                    ->formatStateUsing(fn($state) => ucwords($state))
                    ->searchable(),
                TextColumn::make('kategori')
                    ->state(function (Zakat $record) {
                        return ucwords($record->kategoriZakat->nama_zakat);
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
            ], layout: FiltersLayout::AboveContent);
    }

    public function render(): View
    {
        return view('livewire.list-zakat');
    }
}
