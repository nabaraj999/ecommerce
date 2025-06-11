<?php

namespace App\Filament\Shop\Resources\OrderResource\Pages;

use App\Filament\Shop\Resources\OrderResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateOrder extends CreateRecord
{
    protected static string $resource = OrderResource::class;
}
