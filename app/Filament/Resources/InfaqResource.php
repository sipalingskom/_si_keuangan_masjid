<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InfaqResource\Pages;
use App\Filament\Resources\InfaqResource\RelationManagers;
use App\Models\Infaq;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\View\Components\Modal;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use phpDocumentor\Reflection\Types\Null_;
use SebastianBergmann\CodeCoverage\Report\Html\Colors;
use Illuminate\Support\Str;

use function Pest\Laravel\options;

class InfaqResource extends Resource
{
    protected static ?string $model = Infaq::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    protected static ?string $navigationGroup = 'Transaksi';

    protected static ?int $navigationSort = -5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('kode')
                            ->required()
                            ->default(fn() => Str::random(6))
                            ->readOnly()
                            ->maxLength(6),
                        Forms\Components\TextInput::make('nama')
                            ->required()
                            ->maxLength(70),
                        Forms\Components\TextInput::make('wa')
                            ->label('Nomor Whatsapp')
                            ->required()
                            ->placeholder('Rubah angka 0 diawal menjadi 62. Contoh 62813456XXXXX')
                            ->maxLength(16),
                        Forms\Components\Select::make('kategori')
                            ->options([
                                'masjid' => 'Masjid',
                                'sosial' => 'Sosial',
                            ])
                            ->required(),
                        Forms\Components\Select::make('type')
                            ->options([
                                'pemasukan' => 'Pemasukan',
                                'pengeluaran' => 'Pengeluaran',
                            ])
                            ->required(),
                        Forms\Components\TextInput::make('jumlah')
                            ->prefix('Rp')
                            ->required()
                            ->numeric(),
                        Forms\Components\DatePicker::make('tanggal')
                            ->required(),
                        Forms\Components\Textarea::make('keterangan')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\Hidden::make('bendahara_id')
                            ->default(auth()->user()->id)
                            // ->readOnly()
                            ->required(),
                        Forms\Components\FileUpload::make('bukti')
                            ->disabledOn('edit')
                            ->hiddenOn('edit')
                            ->moveFiles()
                            ->uploadingMessage('Uploading attachment...')
                            ->image()
                            ->required(),
                        Forms\Components\Hidden::make('status')
                            ->disabledOn('edit')
                            ->default('1')
                            ->required(),
                        Forms\Components\Select::make('status')
                            ->disabledOn('create')
                            ->hiddenOn('create')
                            ->options([
                                '1' => 'Berhasil',
                                '2' => 'Gagal',
                            ])
                            ->required(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kode')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama')
                    ->formatStateUsing(fn($state) => ucwords($state))
                    ->searchable(),
                Tables\Columns\TextColumn::make('wa')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kategori')
                    ->formatStateUsing(fn($state) => ucwords($state))
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'masjid' => 'warning',
                        'sosial' => 'primary'
                    })
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->formatStateUsing(fn($state) => ucwords($state))
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'pengeluaran' => 'warning',
                        'pemasukan' => 'primary'
                    })
                    ->searchable(),
                Tables\Columns\TextColumn::make('jumlah')
                    ->prefix('Rp ')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tanggal')
                    ->date('d M Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('bendahara_id')
                    ->label('ACC')
                    ->state(function (Infaq $record) {
                        if ($record->bendahara_id) {
                            return ucwords($record->user->name);
                        } else {
                            return '-';
                        }
                        // ($record->bendahara_id != null) ? ucwords($record->user->name) : '-';
                        // return ucwords($record->user->name);
                    })
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        '0' => 'warning',
                        '1' => 'success',
                        '2' => 'danger',
                    })
                    ->formatStateUsing(function ($state) {
                        if ($state == 0) {
                            return 'Menunggu Verifikasi';
                        }
                        if ($state == 1) {
                            return 'Infaq Berhasil';
                        }
                        if ($state == 2) {
                            return 'Infaq Gagal';
                        }
                    }),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('show_image')
                    ->label('Show')
                    ->url(fn(Infaq $infaq): string => route('infaq.show', ['infaq' => $infaq->bukti]))
                    ->color('warning')
                    ->icon('heroicon-m-photo')
                    ->openUrlInNewTab(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('status', 'asc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInfaqs::route('/'),
            'create' => Pages\CreateInfaq::route('/create'),
            'edit' => Pages\EditInfaq::route('/{record}/edit'),
        ];
    }
}
