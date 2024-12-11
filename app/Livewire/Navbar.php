<?php

namespace App\Livewire;

use App\Models\Setting;
use Livewire\Component;

class Navbar extends Component
{
    public function render()
    {
        $setting = Setting::first();
        return view('livewire.navbar')->with([
            'setting' => $setting
        ]);
    }
}
