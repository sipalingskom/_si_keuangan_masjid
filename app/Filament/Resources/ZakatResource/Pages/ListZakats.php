<?php

namespace App\Filament\Resources\ZakatResource\Pages;

use App\Filament\Resources\ZakatResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListZakats extends ListRecords
{
    protected static string $resource = ZakatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Zakat'),
        ];
    }

    public function getBreadcrumbs(): array
    {
        return ['Zakat'];
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
