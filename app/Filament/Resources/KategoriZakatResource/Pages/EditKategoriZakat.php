<?php

namespace App\Filament\Resources\KategoriZakatResource\Pages;

use App\Filament\Resources\KategoriZakatResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKategoriZakat extends EditRecord
{
    protected static string $resource = KategoriZakatResource::class;

    protected function getRedirectUrl(): ?string
    {
        return $this->getResource()::getUrl('index');
    }

    public function getBreadcrumbs(): array
    {
        return [
            'Kategori Zakat',
            'Ubah Kategori Zakat'
        ];
    }
}
