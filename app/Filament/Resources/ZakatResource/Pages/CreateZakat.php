<?php

namespace App\Filament\Resources\ZakatResource\Pages;

use App\Filament\Resources\ZakatResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Contracts\Support\Htmlable;

class CreateZakat extends CreateRecord
{
    protected static string $resource = ZakatResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    public function getBreadcrumbs(): array
    {
        return [
            'Zakat',
            'Tambah Zakat'
        ];
    }

    public function getHeading(): string|Htmlable
    {
        return "Tambah Zakat";
    }
}
