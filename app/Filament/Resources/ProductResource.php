<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';
  public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
         ->schema([
    Forms\Components\TextInput::make('name')
        ->required()
        ->maxLength(255),
    Forms\Components\TextInput::make('price')
        ->required()
        ->numeric()
        ->prefix('$'),
    Forms\Components\TextInput::make('discount')
        ->required()
        ->numeric()
        ->default(0),
    Forms\Components\Textarea::make('categories')
        ->required()
        ->columnSpanFull(),
    Forms\Components\TextInput::make('brand')
        ->required()
        ->maxLength(255),
    Forms\Components\FileUpload::make('images')
        ->columnSpanFull()
        ->multiple() // Allow multiple images
        ->disk('public') // Specify storage disk
        ->directory('product-images'), // Specify storage directory
    Forms\Components\Textarea::make('description')
        ->required()
        ->columnSpanFull(),
    Forms\Components\TextInput::make('qty')
        ->required()
        ->numeric(),
    Forms\Components\Toggle::make('status')
        ->required()
        ->label('Product Status')
        ->onColor('success') // Green when true (optional)
        ->offColor('danger') // Red when false (optional)
        ->inline(false) // Place label above toggle (optional)
        ->default(true) // Default to true (optional)
        ->formatStateUsing(function ($state) {
            return (bool) $state; // Ensure boolean true/false
        })
        ->dehydrateStateUsing(function ($state) {
            return (bool) $state; // Store as boolean in DB
        }),
    Forms\Components\Select::make('vendor_id')
        ->relationship('vendor', 'name')
        ->required(),
]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->money()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('images')
                    ->columnSpanFull()
                    ->getStateUsing(function ($record) {
                        // Handle single or multiple images
                        return is_array($record->images) ? $record->images[0] : $record->images;
                    }), // Display first image if multiple
                Tables\Columns\TextColumn::make('qty')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('status')
                    ->boolean(),
                Tables\Columns\TextColumn::make('vendor.name')
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
