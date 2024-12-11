<?php

namespace App\Filament\Resources\PengaturanWebResource\Pages;

use App\Filament\Resources\PengaturanWebResource;
use App\Models\Setting;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Model;

class CreatePengaturanWeb extends CreateRecord
{
    protected static string $resource = PengaturanWebResource::class;

    protected static string $view = 'filament.resources.pages.create-pengaturan-web';

    protected function beforeFill()
    {
        $setting = Setting::first();
        if ($setting) {
            Notification::make()
                ->warning()
                ->title('Pengaturan website telah disimpan sebelumnya.')
                ->send();
            return to_route('filament.app.resources.pengaturan-webs.index');
        }
    }

    protected function beforeCreate(): void
    {
        $setting = Setting::first();
        if ($setting) {
            Notification::make()
                ->warning()
                ->title('Data gagal disimpan. Pengaturan website telah diinputkan.')
                ->send();

            $this->halt();
        }
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    public function getBreadcrumbs(): array
    {
        return ['Pengaturan Web', 'Tambah Pengaturan Web'];
    }

    public function getHeading(): string|Htmlable
    {
        return "Tambah Pengaturan Web";
    }
}
