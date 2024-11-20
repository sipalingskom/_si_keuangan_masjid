<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RekeningZakatResource\Pages;
use App\Models\RekeningZakat;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class RekeningZakatResource extends Resource
{
    protected static ?string $model = RekeningZakat::class;

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

    protected static ?string $navigationGroup = 'Halaman';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('no_rek')
                    ->label('Nomor Rekening')
                    ->unique(table: RekeningZakat::class, column: 'no_rek', ignoreRecord: true)
                    ->required()
                    ->maxLength(25),
                Forms\Components\TextInput::make('jenis_bank')
                    ->label('Nama Bank')
                    ->required()
                    ->maxLength(20),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('no_rek')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jenis_bank')
                    ->formatStateUsing(fn($state) => strtoupper($state))
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
            'index' => Pages\ListRekeningZakats::route('/'),
            'create' => Pages\CreateRekeningZakat::route('/create'),
            'edit' => Pages\EditRekeningZakat::route('/{record}/edit'),
        ];
    }
}
