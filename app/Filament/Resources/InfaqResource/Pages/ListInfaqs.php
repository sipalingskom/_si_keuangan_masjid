<?php

namespace App\Filament\Resources\InfaqResource\Pages;

use App\Filament\Resources\InfaqResource;
use Filament\Resources\Components\Tab;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListInfaqs extends ListRecords
{
    protected static string $resource = InfaqResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Infaq'),
            Actions\Action::make('edit')
                ->label('Cetak PDF')
                ->url(fn (): string => route('pdfreport.cetak', 'infaq'))
        ];
        // return [];
    }

    public function getBreadcrumbs(): array
    {
        return ['Infaq'];
    }

    public function getTabs(): array
    {
        return [
            'semua' => Tab::make(),
            'pemasukan' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('type', 'pemasukan')),
            'pengeluaran' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('type', 'pengeluaran')),
        ];
    }
}
