<?php

namespace App\Filament\Resources\InfaqResource\Pages;

use App\Filament\Resources\InfaqResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Contracts\Support\Htmlable;

class CreateInfaq extends CreateRecord
{
    protected static string $resource = InfaqResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    public function getBreadcrumbs(): array
    {
        return [
            'Infaq',
            'Tambah Infaq'
        ];
    }

    public function getHeading(): string|Htmlable
    {
        return "Tambah Infaq";
    }
}
