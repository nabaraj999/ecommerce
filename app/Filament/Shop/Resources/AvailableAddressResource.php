<?php

namespace App\Filament\Shop\Resources;

use App\Filament\Shop\Resources\AvailableAddressResource\Pages;
use App\Filament\Shop\Resources\AvailableAddressResource\RelationManagers;
use App\Models\AvailableAddress;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class AvailableAddressResource extends Resource
{
    protected static ?string $model = AvailableAddress::class;

    protected static ?string $navigationIcon = 'heroicon-o-home-modern';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('vendor_id', Auth::guard('vendor')->user()->id);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('address')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('NRs.'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->prefix("Nrs")
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListAvailableAddresses::route('/'),
            'create' => Pages\CreateAvailableAddress::route('/create'),
            'edit' => Pages\EditAvailableAddress::route('/{record}/edit'),
        ];
    }
}
