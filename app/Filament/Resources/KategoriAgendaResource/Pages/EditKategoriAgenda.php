<?php

namespace App\Filament\Resources\KategoriAgendaResource\Pages;

use App\Filament\Resources\KategoriAgendaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKategoriAgenda extends EditRecord
{
    protected static string $resource = KategoriAgendaResource::class;

    protected function getRedirectUrl(): ?string
    {
        return $this->getResource()::getUrl('index');
    }

    public function getBreadcrumbs(): array
    {
        return [
            'Kategori Agenda',
            'Ubah Kategori Agenda'
        ];
    }
}
