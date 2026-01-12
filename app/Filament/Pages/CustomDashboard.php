<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\AlertsWidget;
use App\Filament\Widgets\TalentDistributionChart;
use App\Filament\Widgets\TalentSummaryTable;
use App\Filament\Widgets\TotalTalentWidget;
use Filament\Pages\Dashboard as BaseDashboard;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CustomDashboard extends BaseDashboard
{
    protected static ?string $title = 'Talent Management Dashboard';
    
    protected static ?string $navigationLabel = 'Dashboard';

    public static function canAccess(): bool
    {
        /** @var User|null $user */
        $user = Auth::user();
        return $user?->isAdmin() ?? false;
    }

    public function getWidgets(): array
    {
        return [
            TotalTalentWidget::class,
            TalentDistributionChart::class,
            TalentSummaryTable::class,
            AlertsWidget::class,
        ];
    }

    public function getColumns(): int | array
    {
        return 12;
    }
}
