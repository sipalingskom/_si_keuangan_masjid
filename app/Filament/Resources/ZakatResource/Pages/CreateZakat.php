<?php

namespace App\Filament\Resources\ZakatResource\Pages;

use App\Filament\Resources\ZakatResource;
use App\Traits\SendMessageWA;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Model;

class CreateZakat extends CreateRecord
{
    use SendMessageWA;
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

    protected function handleRecordCreation(array $data): Model
    {
        if ($data['status'] == 1) {
            $data['keterangan'] = 'Bukti transfer berhasil dikonfirmasi oleh admin.';
        }

        $this->pushMessage($this->data['wa'], $data['keterangan']);
        return static::getModel()::create($data);
    }
}
