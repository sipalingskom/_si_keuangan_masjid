<?php

namespace App\Livewire\LandingPage;

use App\Models\Infaq;
use App\Models\Zakat;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Illuminate\Http\Request;
use Livewire\Component;

class CariKode extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('kode')
                    ->label('Kode Transksi')
                    ->autocomplete(false)
                    ->required()
                    ->maxValue(6)
                    ->maxLength(6),
            ])->statePath('data');
    }

    public function show(Request $request)
    {
        $infaq = Infaq::where('kode', $request->kode)->first();
        $zakat = Zakat::where('kode', $request->kode)->first();

        if ($infaq) {
            $datass = $infaq;
            return response()->json([
                'success' => true,
                'message' => 'Data Infaq',
                'data'    => $datass
            ]);
        } elseif ($zakat) {
            $datass = $zakat;
            return response()->json([
                'success' => true,
                'message' => 'Data Zakat',
                'data'    => $datass
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Tidak Ditemukan',
                'data'    => 'Kode Bukti Tranfer Tidak Ditemukan',
            ]);
        }
    }

    public function render()
    {
        return view('livewire.landing-page.cari-kode');
    }
}
