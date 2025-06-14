<?php

namespace App\Filament\Widgets;

use App\Filament\Shop\Resources\OrderResource\Pages\ListOrders;
use App\Models\Advertise;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class OrderData extends ChartWidget
{
    protected static ?string $heading = 'Advertise Data';
    protected static ?int $sort = 2;

    protected function getData(): array
    {
        // Initialize an array with 12 zeros (one for each month)
        $monthlyCounts = array_fill(1, 12, 0);

        // Query to count Advertise records grouped by month
        $advertises = Advertise::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as count')
        )
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->pluck('count', 'month')
            ->toArray();

        // Populate the monthly counts array with the query results
        foreach ($advertises as $month => $count) {
            $monthlyCounts[$month] = $count;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Advertise Per Month',
                    'data' => array_values($monthlyCounts),
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
