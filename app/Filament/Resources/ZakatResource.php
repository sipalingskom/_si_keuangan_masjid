<?php

namespace App\Filament\Resources;

use App\Filament\Exports\ZakatExporter;
use App\Filament\Resources\ZakatResource\Pages;
use App\Filament\Resources\ZakatResource\RelationManagers;
use App\Models\Zakat;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ExportAction;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use Illuminate\Support\Str;

class ZakatResource extends Resource
{
    protected static ?string $model = Zakat::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    protected static ?string $navigationGroup = 'Transaksi';

    protected static ?int $navigationSort = -3;

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
                        Forms\Components\Select::make('kategori_id')
                            ->relationship(name: 'kategoriZakat', titleAttribute: 'nama_zakat')
                            ->required(),
                        Forms\Components\Hidden::make('petugas_id')
                            ->default(auth()->user()->id)
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
                        Forms\Components\FileUpload::make('bukti')
                            ->moveFiles()
                            ->uploadingMessage('Uploading attachment...')
                            ->image()
                            ->required(),
                        Forms\Components\Hidden::make('status')
                            ->default('1')
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
                Tables\Columns\TextColumn::make('kategori_id')
                    ->state(function (Zakat $record) {
                        return ucwords($record->kategoriZakat->nama_zakat);
                    })
                    ->sortable(),
                Tables\Columns\TextColumn::make('petugas_id')
                    ->label('ACC')
                    ->state(function (Zakat $record) {
                        if ($record->petugas_id) {
                            return ucwords($record->petugas->name);
                        } else {
                            return '-';
                        }
                    })
                    ->sortable(),
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
                    ->url(fn(Zakat $zakat): string => route('infaq.show', ['infaq' => $zakat->bukti]))
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListZakats::route('/'),
            'create' => Pages\CreateZakat::route('/create'),
            'edit' => Pages\EditZakat::route('/{record}/edit'),
        ];
    }
}
