<?php

namespace App\Filament\Widgets;

use App\Models\Employee;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Cache;

class TotalTalentWidget extends BaseWidget
{
    protected static ?int $sort = 1;
    
    // Lazy load widget
    protected static bool $isLazy = true;
    
    // Poll every 5 minutes
    protected static ?string $pollingInterval = '300s';

    protected function getStats(): array
    {
        // Cache for 5 minutes
        $stats = Cache::remember('talent_stats', 300, function () {
            // Single optimized query
            $counts = Employee::selectRaw('
                COUNT(*) as total,
                SUM(CASE WHEN talent_category = \'High Potential\' THEN 1 ELSE 0 END) as high_potential,
                SUM(CASE WHEN talent_category = \'Promotable\' THEN 1 ELSE 0 END) as promotable,
                SUM(CASE WHEN talent_category = \'Non Talent\' THEN 1 ELSE 0 END) as non_talent
            ')->first();

            return [
                'total' => $counts->total,
                'high_potential' => $counts->high_potential,
                'promotable' => $counts->promotable,
                'non_talent' => $counts->non_talent,
            ];
        });

        return [
            Stat::make('Total Talent', $stats['total'] . ' Talent')
                ->description('Total employees in the system')
                ->descriptionIcon('heroicon-o-users')
                ->color('primary'),
            
            Stat::make('High Potential', $stats['high_potential'] . ' Talent')
                ->description('Employees with high potential')
                ->descriptionIcon('heroicon-o-star')
                ->color('success'),
            
            Stat::make('Promotable', $stats['promotable'] . ' Talent')
                ->description('Ready for promotion')
                ->descriptionIcon('heroicon-o-arrow-trending-up')
                ->color('warning'),
            
            Stat::make('Non Talent', $stats['non_talent'] . ' Talent')
                ->description('Requires development')
                ->descriptionIcon('heroicon-o-exclamation-triangle')
                ->color('danger'),
        ];
    }
}
