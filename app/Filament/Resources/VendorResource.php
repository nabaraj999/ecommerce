<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VendorResource\Pages;
use App\Filament\Resources\VendorResource\RelationManagers;
use App\Models\Vendor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VendorResource extends Resource
{
    protected static ?string $model = Vendor::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('expire_date')
                ->minDate(now()),
                Forms\Components\Select::make('status')
                  ->options([
                    "pending"=>"Pending",
                    "approved"=>"Approved",
                    "rejected"=>"Rejected",
                ])

                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                ->copyable()
                ->searchable(),

                Tables\Columns\TextColumn::make('pan_no')
                    ->searchable(),
                Tables\Columns\TextColumn::make('contact_no')
                ->copyable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('expire_date')

                    ->date()
                    ->sortable(),
                Tables\Columns\SelectColumn::make('status')
                ->options([
                    "pending"=>"Pending",
                    "approved"=>"Approved",
                    "rejected"=>"Rejected",
                ]),

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
                SelectFilter::make("status")
                ->options([
                    "pending"=>"Pending",
                    "approved"=>"Approved",
                    "rejected"=>"Rejected",
                ]),

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
            'index' => Pages\ListVendors::route('/'),
            'create' => Pages\CreateVendor::route('/create'),
            //'edit' => Pages\EditVendor::route('/{record}/edit'),
        ];
    }
}
