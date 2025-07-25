<?php

namespace App\Filament\Shop\Resources;

use id;
use Filament\Forms;
use Filament\Tables;
use App\Models\Product;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Shop\Resources\ProductResource\Pages;
use App\Filament\Shop\Resources\ProductResource\RelationManagers;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';

    public static function getEloquentQuery(): Builder
    {
       return parent::getEloquentQuery()->where('vendor_id', Auth::guard('vendor')->user()->id);
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
      Forms\Components\TextInput::make('vendor_id')
                    ->required()
                    ->default(Auth::user()->id)
                    ->hidden(),
]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                   ->limit(20)
                    ->searchable(),
                Tables\Columns\ImageColumn::make('images'),
                Tables\Columns\TextColumn::make('price')
                    ->prefix("NRs.")
                    ->searchable(),
                     Tables\Columns\TextColumn::make('qty')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('discount')
                    ->suffix("%")
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('brand')
                    ->searchable(),
                Tables\Columns\ToggleColumn::make('status'),

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
