<?php

namespace App\Filament\Resources\AgendaResource\Widgets;

use App\Filament\Resources\AgendaResource;
use App\Filament\Resources\ZakatResource;
use App\Models\Agenda;
use Filament\Actions\Action;
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;
use Saade\FilamentFullCalendar\Actions;

class FullCalenderAgenda extends FullCalendarWidget
{
    public function fetchEvents(array $fetchInfo): array
    {
        return Agenda::query()
            ->where('waktu_mulai', '>=', $fetchInfo['start'])
            ->where('waktu_selesai', '<=', $fetchInfo['end'])
            ->get()
            ->map(
                fn(Agenda $agenda) => [
                    'title' => $agenda->nama_kegiatan,
                    'start' => $agenda->waktu_mulai,
                    'end' => $agenda->waktu_selesai,
                    'url' => AgendaResource::getUrl(name: 'view', parameters: ['record' => $agenda]),
                    'shouldOpenUrlInNewTab' => true
                ]
            )
            ->all();
    }
}
