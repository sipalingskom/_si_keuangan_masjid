<?php

namespace App\Filament\Resources\ZakatResource\Pages;

use App\Filament\Resources\ZakatResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditZakat extends EditRecord
{
    protected static string $resource = ZakatResource::class;

    protected function getRedirectUrl(): ?string
    {
        return $this->getResource()::getUrl('index');
    }

    public function getBreadcrumbs(): array
    {
        return [
            'Zakat',
            'Ubah Zakat'
        ];
    }
}
