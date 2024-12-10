<?php

namespace App\Livewire;

use App\Models\Infaq;
use App\Models\Zakat;
use App\Models\RekeningZakat;
use App\Models\Setting;
use Livewire\Component;

class LandingPage extends Component
{
    public function render()
    {
        $pemasukanInfaq = Infaq::where('type', 'pemasukan')->pluck('jumlah')->toArray();
        $pengeluaranInfaq = Infaq::where('type', 'pengeluaran')->pluck('jumlah')->toArray();
        $totalInfaq = array_sum($pemasukanInfaq) - array_sum($pengeluaranInfaq);
        $pemasukanZakat = Zakat::where('type', 'pemasukan')->pluck('jumlah')->toArray();
        $pengeluaranZakat = Zakat::where('type', 'pengeluaran')->pluck('jumlah')->toArray();
        $totalZakat = array_sum($pemasukanZakat) - array_sum($pengeluaranZakat);
        $rekeningZakat = RekeningZakat::all();
        $setting = Setting::first();

        return view('livewire.landing-page', with([
            'pemasukanInfaq' => $pemasukanInfaq,
            'pengeluaranInfaq' => $pengeluaranInfaq,
            'totalInfaq' => $totalInfaq,
            'pemasukanZakat' => $pemasukanZakat,
            'pengeluaranZakat' => $pengeluaranZakat,
            'totalZakat' => $totalZakat,
            'rekeningZakat' => $rekeningZakat,
            'setting' => $setting,
        ]));
    }
}
