<?php

namespace App\Filament\Shop\Resources\AvailableAddressResource\Pages;

use App\Filament\Shop\Resources\AvailableAddressResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateAvailableAddress extends CreateRecord
{
    protected static string $resource = AvailableAddressResource::class;

       protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['vendor_id'] = Auth::guard('vendor')->user()->id;

        return $data;
    }
}
