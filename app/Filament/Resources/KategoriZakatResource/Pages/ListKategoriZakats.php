<?php

namespace App\Filament\Resources\KategoriZakatResource\Pages;

use App\Filament\Resources\KategoriZakatResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKategoriZakats extends ListRecords
{
    protected static string $resource = KategoriZakatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Kategori Zakat'),
        ];
    }

    public function getBreadcrumbs(): array
    {
        return ['Kategori Zakat'];
    }
}
