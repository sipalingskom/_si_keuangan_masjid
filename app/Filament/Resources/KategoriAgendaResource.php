<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KategoriAgendaResource\Pages;
use App\Models\KategoriAgenda;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class KategoriAgendaResource extends Resource
{
    protected static ?string $model = KategoriAgenda::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    protected static ?string $navigationGroup = 'Halaman';

    protected static ?int $navigationSort = -2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('kategori')
                            ->label('Nama Kategori Agenda')
                            ->required()
                            ->maxLength(70),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kategori')
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
            'index' => Pages\ListKategoriAgendas::route('/'),
            'create' => Pages\CreateKategoriAgenda::route('/create'),
            'edit' => Pages\EditKategoriAgenda::route('/{record}/edit'),
        ];
    }
}
