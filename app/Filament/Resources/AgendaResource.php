<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AgendaResource\Pages;
use App\Filament\Resources\AgendaResource\RelationManagers;
use App\Models\Agenda;
use App\Models\KategoriAgenda;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AgendaResource extends Resource
{
    protected static ?string $model = Agenda::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    protected static ?string $navigationGroup = 'Halaman';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\DateTimePicker::make('waktu')
                            ->required(),
                        Forms\Components\TextInput::make('nama_kegiatan')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Hidden::make('ketua_id')
                            ->default(auth()->user()->id)
                            // ->readOnly()
                            ->required(),
                        Forms\Components\TextInput::make('ketua')
                            ->default(auth()->user()->name)
                            ->disabled()
                            ->required(),
                        Forms\Components\Select::make('kategori_agenda_id')
                            ->label('Kategori Agenda')
                            ->options(KategoriAgenda::all()->pluck('kategori', 'id'))
                            ->required(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('waktu')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nama_kegiatan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ketua_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('kategori_agenda_id')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListAgendas::route('/'),
            'create' => Pages\CreateAgenda::route('/create'),
            'edit' => Pages\EditAgenda::route('/{record}/edit'),
        ];
    }
}
