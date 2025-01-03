<?php

namespace App\Livewire\LandingPage;

use App\Models\Infaq;
use App\Models\KategoriZakat;
use App\Models\RekeningZakat;
use App\Models\Zakat;
use App\Traits\SendMessageWA;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Notifications\Notification;
use Livewire\Component;
use Illuminate\Support\Str;

class RekeningMasjid extends Component implements HasForms
{
    use InteractsWithForms, SendMessageWA;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        $kategoriZakat = KategoriZakat::pluck('nama_zakat', 'id')->toArray();
        return $form
            ->schema([
                TextInput::make('nama')
                    ->required()
                    ->maxLength(70),
                TextInput::make('wa')
                    ->label('Nomor Whatsapp')
                    ->required()
                    ->placeholder('Rubah angka 0 diawal menjadi 62. Contoh 62813456XXXXX')
                    ->maxLength(16),
                Select::make('kategori')
                    ->options([
                        'infaq' => 'Infaq',
                        'zakat' => 'Zakat',
                    ])
                    ->required()
                    ->live(),
                Select::make('tipe_infaq')
                    ->label('Tipe Infaq')
                    ->options([
                        'masjid' => 'Masjid',
                        'sosial' => 'Sosial',
                    ])
                    ->visible(fn(Get $get): bool => $get('kategori') === 'infaq')
                    ->required(fn(Get $get): bool => $get('kategori') === 'infaq'),
                Select::make('tipe_zakat')
                    ->label('Tipe Zakat')
                    ->options($kategoriZakat)
                    ->visible(fn(Get $get): bool => $get('kategori') === 'zakat')
                    ->required(fn(Get $get): bool => $get('kategori') === 'zakat'),
                TextInput::make('jumlah')
                    ->prefix('Rp')
                    ->required()
                    ->numeric(),
                DatePicker::make('tanggal')
                    ->required(),
                FileUpload::make('bukti')
                    ->moveFiles()
                    ->image()
                    ->required(),
            ])->statePath('data');
    }

    public function create(): void
    {
        $kode = Str::random(6);
        $datas = [];
        if ($this->data['kategori'] == 'infaq') {
            $datas = Infaq::create([
                'kode' => $kode,
                'nama' => $this->data['nama'],
                'wa' => $this->data['wa'],
                'kategori' => $this->data['tipe_infaq'],
                'type' => 'pemasukan',
                'jumlah' => $this->data['jumlah'],
                'tanggal' => $this->data['tanggal'],
                'keterangan' => 'Bukti transfer berhasil dikirim. Menunggu konfirmasi dari bendahara.',
                'bukti' => $this->form->getState()['bukti'],
                'status' => '0',
            ]);
        }
        if ($this->data['kategori'] == 'zakat') {
            $datas = Zakat::create([
                'kode' => $kode,
                'nama' => $this->data['nama'],
                'wa' => $this->data['wa'],
                'kategori_id' => $this->data['tipe_zakat'],
                'type' => 'pemasukan',
                'jumlah' => $this->data['jumlah'],
                'tanggal' => $this->data['tanggal'],
                'keterangan' => 'Bukti transfer berhasil dikirim. Menunggu konfirmasi dari bendahara.',
                'bukti' => $this->form->getState()['bukti'],
                'status' => '0',
            ]);
        }

        if ($datas != []) {
            $this->form->getState();
            Notification::make()
                ->title('Bukti Transfer Berhasil Dikirim')
                ->success()
                ->send();
            $this->pushMessage($this->data['wa'], 'Bukti Transfer Berhasil Dikirim. Kode transaksi anda adalah ' . $kode . '. Silahkan cek untuk status transaksi.');
            $this->form->fill();
        } else {
            Notification::make()
                ->title('Bukti Transfer Gagal Dikirim')
                ->danger()
                ->send();
            $this->form->fill();
        }
    }

    public function render()
    {
        $rekeningMasjid = RekeningZakat::all();
        return view('livewire.landing-page.rekening-masjid', compact('rekeningMasjid'));
    }
}
