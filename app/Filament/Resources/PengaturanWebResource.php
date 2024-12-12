<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengaturanWebResource\Pages;
use App\Filament\Resources\PengaturanWebResource\RelationManagers;
use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PengaturanWebResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-8-tooth';

    protected static ?string $navigationGroup = 'Halaman Utama';

    protected static ?string $navigationLabel = 'Pengaturan Web';

    protected static ?string $modelLabel = 'Pengaturan Web';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('nama_web')
                            ->label('Nama Website')
                            ->required()
                            ->maxLength(70),
                        Forms\Components\TextInput::make('no_telp')
                            ->label('Nomor Telepon atau Whatsapp')
                            ->required()
                            ->maxLength(14),
                        Forms\Components\TextInput::make('email')
                            ->label('Alamat Email')
                            ->required()
                            ->email()
                            ->maxLength(70),
                        Forms\Components\Textarea::make('alamat')
                            ->label('Alamat Masjid')
                            ->required(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_web')
                    ->label('Nama Website'),
                Tables\Columns\TextColumn::make('no_telp'),
                Tables\Columns\TextColumn::make('email')
                    ->formatStateUsing(fn($state) => ucwords($state)),
                Tables\Columns\TextColumn::make('alamat')
                    ->formatStateUsing(fn($state) => ucwords($state))
                    ->limit(30),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPengaturanWebs::route('/'),
            'create' => Pages\CreatePengaturanWeb::route('/create'),
            'edit' => Pages\EditPengaturanWeb::route('/{record}/edit'),
        ];
    }
}
