<?php

namespace App\Filament\Resources\InfaqResource\Pages;

use App\Filament\Resources\InfaqResource;
use App\Traits\SendMessageWA;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Model;

class EditInfaq extends EditRecord
{
    use SendMessageWA;
    protected static string $resource = InfaqResource::class;

    protected function getRedirectUrl(): ?string
    {
        return $this->getResource()::getUrl('index');
    }

    public function getHeading(): string|Htmlable
    {
        return "Ubah Infaq";
    }

    public function getBreadcrumbs(): array
    {
        return [
            'Infaq',
            'Ubah Infaq'
        ];
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $data['bendahara_id'] = auth()->user()->id;
        if ($data['status'] == 1) {
            $data['keterangan'] = 'Bukti transfer berhasil dikonfirmasi oleh admin.';
        }

        $record->update($data);
        $this->pushMessage($this->data['wa'], $data['keterangan']);

        return $record;
    }
}
