<?php

namespace App\Filament\Resources\KategoriAgendaResource\Pages;

use App\Filament\Resources\KategoriAgendaResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Contracts\Support\Htmlable;

class CreateKategoriAgenda extends CreateRecord
{
    protected static string $resource = KategoriAgendaResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    public function getBreadcrumbs(): array
    {
        return [
            'Kategori Agenda',
            'Tambah Kategori Agenda'
        ];
    }

    public function getHeading(): string|Htmlable
    {
        return "Tambah Kategori Agenda";
    }
}
