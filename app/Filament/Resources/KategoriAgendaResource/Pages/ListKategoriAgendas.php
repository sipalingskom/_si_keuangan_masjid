<?php

namespace App\Filament\Resources\KategoriAgendaResource\Pages;

use App\Filament\Resources\KategoriAgendaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKategoriAgendas extends ListRecords
{
    protected static string $resource = KategoriAgendaResource::class;

    public function getBreadcrumbs(): array
    {
        return ['Kategori Agenda'];
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Kategori Agenda'),
        ];
    }
}
