<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\AdvertiseResource\Pages\ListAdvertises;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Vendor;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class statwidget extends BaseWidget
{
    protected function getStats(): array

    {
        
        return [
            Stat::make('Total Vendor', Vendor::count()),
            Stat::make('Total User', User::count()),
            Stat::make('Product', Product::count()),
            Stat::make('Order', Order::count()),
        ];
    }
}
