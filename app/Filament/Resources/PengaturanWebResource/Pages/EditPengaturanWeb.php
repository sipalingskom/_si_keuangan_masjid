<?php

namespace App\Filament\Resources\PengaturanWebResource\Pages;

use App\Filament\Resources\PengaturanWebResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;

class EditPengaturanWeb extends EditRecord
{
    protected static string $resource = PengaturanWebResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    public function getBreadcrumbs(): array
    {
        return ['Pengaturan Web', 'Ubah Pengaturan Web'];
    }

    public function getHeading(): string|Htmlable
    {
        return "Ubah Pengaturan Web";
    }
}
