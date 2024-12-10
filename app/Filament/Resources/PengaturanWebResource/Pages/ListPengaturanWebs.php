<?php

namespace App\Filament\Resources\PengaturanWebResource\Pages;

use App\Filament\Resources\PengaturanWebResource;
use App\Models\Setting;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPengaturanWebs extends ListRecords
{
    protected static string $resource = PengaturanWebResource::class;

    public function getBreadcrumbs(): array
    {
        return ['Pengaturan Web'];
    }

    protected function getHeaderActions(): array
    {
        $setting = Setting::first();

        if ($setting == null) {
            return [
                Actions\CreateAction::make()
                    ->label('Tambah Pengaturan Web'),
            ];
        } else {
            return [];
        }
    }
}
