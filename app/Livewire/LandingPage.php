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
        $setting = Setting::first();

        return view('livewire.landing-page', with([
            'setting' => $setting,
        ]));
    }
}
