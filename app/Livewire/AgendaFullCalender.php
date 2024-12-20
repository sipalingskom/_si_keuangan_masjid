<?php

namespace App\Livewire;

use App\Models\Agenda;
use Livewire\Component;

class AgendaFullCalender extends Component
{
    public function render()
    {
        $events = [];
        $agendas = Agenda::with(['ketua', 'kategoriAgenda'])->get();
        foreach ($agendas as $agenda) {
            $events[] = [
                'title' => $agenda->nama_kegiatan,
                'start' => $agenda->waktu_mulai,
                'end' => $agenda->waktu_selesai,
            ];
        }

        return view('livewire.agenda-full-calender', compact('events'));
    }
}
