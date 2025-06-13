<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdvertiseResource\Pages;
use App\Filament\Resources\AdvertiseResource\RelationManagers;
use App\Models\Advertise;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AdvertiseResource extends Resource
{
    protected static ?string $model = Advertise::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('company_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('contact')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('expire_date')
                    ->minDate(now())
                    ->required(),
                Forms\Components\Select::make('ad_position')
                    ->required()
                    ->options([
                        'featured' => 'featured',
                        'form' => 'form',
                        'product' => 'product',
                        'vendor' => 'vendor',
                    ]),
                Forms\Components\TextInput::make('redirect_url')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('image')
                    ->label('Image (120x1200)')
                    ->image()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('redirect_url')
                    ->searchable(),
                Tables\Columns\TextColumn::make('company_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('contact')
                    ->searchable(),
                Tables\Columns\TextColumn::make('expire_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('ad_position')
                    ->searchable(),
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
            'index' => Pages\ListAdvertises::route('/'),
            'create' => Pages\CreateAdvertise::route('/create'),
            // 'edit' => Pages\EditAdvertise::route('/{record}/edit'),
        ];
    }
}
