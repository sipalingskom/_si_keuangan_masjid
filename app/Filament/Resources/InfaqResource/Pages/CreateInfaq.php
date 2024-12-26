<?php

namespace App\Filament\Resources\InfaqResource\Pages;

use App\Filament\Resources\InfaqResource;
use App\Traits\SendMessageWA;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Model;


class CreateInfaq extends CreateRecord
{
    use SendMessageWA;
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

    protected function handleRecordCreation(array $data): Model
    {
        if ($data['status'] == 1) {
            $data['keterangan'] = 'Bukti transfer berhasil dikonfirmasi oleh admin.';
        }

        $this->pushMessage($this->data['wa'], $data['keterangan']);
        return static::getModel()::create($data);
    }
}
