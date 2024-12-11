<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KategoriZakatResource\Pages;
use App\Models\KategoriZakat;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class KategoriZakatResource extends Resource
{
    protected static ?string $model = KategoriZakat::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    protected static ?string $navigationGroup = 'Transaksi';

    protected static ?int $navigationSort = -4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('nama_zakat')
                            ->label('Nama Kategori Zakat')
                            ->required()
                            ->maxLength(70),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_zakat')
                    ->formatStateUsing(fn($state) => ucwords($state))
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListKategoriZakats::route('/'),
            'create' => Pages\CreateKategoriZakat::route('/create'),
            'edit' => Pages\EditKategoriZakat::route('/{record}/edit'),
        ];
    }
}
