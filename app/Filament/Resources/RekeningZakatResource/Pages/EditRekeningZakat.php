<?php

namespace App\Filament\Resources\RekeningZakatResource\Pages;

use App\Filament\Resources\RekeningZakatResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRekeningZakat extends EditRecord
{
    protected static string $resource = RekeningZakatResource::class;

    protected function getRedirectUrl(): ?string
    {
        return $this->getResource()::getUrl('index');
    }

    public function getBreadcrumbs(): array
    {
        return [
            'Rekening Zakat',
            'Ubah Rekening Zakat'
        ];
    }
}
