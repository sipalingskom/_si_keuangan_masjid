<?php

namespace App\Filament\Resources\RekeningZakatResource\Pages;

use App\Filament\Resources\RekeningZakatResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Contracts\Support\Htmlable;

class CreateRekeningZakat extends CreateRecord
{
    protected static string $resource = RekeningZakatResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    public function getBreadcrumbs(): array
    {
        return [
            'Rekening Zakat',
            'Tambah Rekening Zakat'
        ];
    }

    public function getHeading(): string|Htmlable
    {
        return "Tambah Rekening Zakat";
    }
}
