<?php

namespace App\Filament\Resources\KategoriZakatResource\Pages;

use App\Filament\Resources\KategoriZakatResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Contracts\Support\Htmlable;

class CreateKategoriZakat extends CreateRecord
{
    protected static string $resource = KategoriZakatResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    public function getBreadcrumbs(): array
    {
        return [
            'Kategori Zakat',
            'Tambah Kategori Zakat'
        ];
    }

    public function getHeading(): string|Htmlable
    {
        return "Tambah Kategori Zakat";
    }
}
