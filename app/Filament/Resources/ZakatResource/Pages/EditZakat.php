<?php

namespace App\Filament\Resources\ZakatResource\Pages;

use App\Filament\Resources\ZakatResource;
use App\Traits\SendMessageWA;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Model;

class EditZakat extends EditRecord
{
    use SendMessageWA;
    protected static string $resource = ZakatResource::class;

    protected function getRedirectUrl(): ?string
    {
        return $this->getResource()::getUrl('index');
    }

    public function getHeading(): string|Htmlable
    {
        return "Konfirmasi Zakat";
    }

    public function getBreadcrumbs(): array
    {
        return [
            'Zakat',
            'Konfirmasi Zakat'
        ];
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $data['petugas_id'] = auth()->user()->id;
        if ($data['status'] == 1) {
            $data['keterangan'] = 'Bukti transfer berhasil dikonfirmasi oleh admin.';
        }

        $record->update([
            'petugas_id' => $data['petugas_id'],
            'keterangan' => $data['keterangan'],
            'status' => $data['status'],
        ]);
        $this->pushMessage($this->data['wa'], $data['keterangan']);

        return $record;
    }
}
