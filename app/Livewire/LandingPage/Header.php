<?php

namespace App\Livewire\LandingPage;

use App\Models\Setting;
use Livewire\Component;

class Header extends Component
{
    public function render()
    {
        $setting = Setting::first();

        return view('livewire.landing-page.header', compact('setting'));
    }
}
