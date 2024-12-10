<?php

namespace App\Filament\Resources\PengaturanWebResource\Pages;

use App\Filament\Resources\PengaturanWebResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Contracts\Support\Htmlable;

class CreatePengaturanWeb extends CreateRecord
{
    protected static string $resource = PengaturanWebResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    public function getBreadcrumbs(): array
    {
        return ['Pengaturan Web', 'Tambah Pengaturan Web'];
    }

    public function getHeading(): string|Htmlable
    {
        return "Tambah Pengaturan Web";
    }
}
