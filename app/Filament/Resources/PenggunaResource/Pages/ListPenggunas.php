<?php

namespace App\Filament\Resources\PenggunaResource\Pages;

use App\Filament\Resources\PenggunaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Colors\Color;

class ListPenggunas extends ListRecords
{
    protected static string $resource = PenggunaResource::class;

    public function getBreadcrumbs(): array
    {
        return ['Pengguna'];
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Pengguna'),
        ];
    }
}
