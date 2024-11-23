<?php

namespace App\Filament\Resources\RekeningZakatResource\Pages;

use App\Filament\Resources\RekeningZakatResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRekeningZakats extends ListRecords
{
    protected static string $resource = RekeningZakatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Rekening Zakat'),
        ];
    }

    public function getBreadcrumbs(): array
    {
        return ['Rekening Zakat'];
    }
}
