<?php

namespace App\Filament\Resources\PenggunaResource\Pages;

use App\Filament\Resources\PenggunaResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePengguna extends CreateRecord
{
    protected static string $resource = PenggunaResource::class;

    public function getBreadcrumbs(): array
    {
        return [
            'Pengguna',
            'Tambah Penggna'
        ];
    }

    public function getHeading(): string
    {
        return "Tambah Pengguna";
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
