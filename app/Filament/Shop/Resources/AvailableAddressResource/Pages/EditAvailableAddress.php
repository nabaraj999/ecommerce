<?php

namespace App\Filament\Shop\Resources\AvailableAddressResource\Pages;

use App\Filament\Shop\Resources\AvailableAddressResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAvailableAddress extends EditRecord
{
    protected static string $resource = AvailableAddressResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
