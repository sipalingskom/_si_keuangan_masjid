<?php

namespace App\Livewire\LandingPage;

use App\Models\Infaq;
use App\Models\Zakat;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
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

    public function show()
    {
        $infaq = Infaq::where('kode', $this->data['kode'])->first();
        $zakat = Zakat::where('kode', $this->data['kode'])->first();

        if ($infaq) {
            $datass = $infaq;
            dd($datass);
            return response()->json($datass);
        } elseif ($zakat) {
            $datass = $zakat;
            dd($datass);
            return response()->json($datass);
        } else {
            Notification::make()
                ->title('Kode Bukti Tranfer Tidak Ditemukan.')
                ->danger()
                ->send();
        }
    }

    public function render()
    {
        return view('livewire.landing-page.cari-kode');
    }
}
