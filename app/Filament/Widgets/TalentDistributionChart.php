<?php

namespace App\Filament\Widgets;

use App\Models\Employee;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class TalentDistributionChart extends ChartWidget
{
    protected static ?string $heading = 'Talent Distribution by Job Level';
    protected static ?int $sort = 2;
    
    // Lazy load widget
    protected static bool $isLazy = true;
    
    // Poll every 5 minutes
    protected static ?string $pollingInterval = '300s';

    protected function getData(): array
    {
        return Cache::remember('talent_distribution_chart', 300, function () {
            $jobLevels = ['BOD-1', 'BOD-2', 'BOD-3', 'BOD-4'];
            
            // Single optimized query using groupBy
            $data = Employee::select('job_level', 'talent_category', DB::raw('count(*) as total'))
                ->whereIn('job_level', $jobLevels)
                ->whereIn('talent_category', ['High Potential', 'Promotable', 'Non Talent'])
                ->groupBy('job_level', 'talent_category')
                ->get()
                ->groupBy('job_level');
            
            $highPotentialData = [];
            $promotableData = [];
            $nonTalentData = [];

            foreach ($jobLevels as $level) {
                $levelData = $data->get($level, collect());
                
                $highPotentialData[] = $levelData->firstWhere('talent_category', 'High Potential')?->total ?? 0;
                $promotableData[] = $levelData->firstWhere('talent_category', 'Promotable')?->total ?? 0;
                $nonTalentData[] = $levelData->firstWhere('talent_category', 'Non Talent')?->total ?? 0;
            }

            return [
                'datasets' => [
                    [
                        'label' => 'High Potential',
                        'data' => $highPotentialData,
                        'backgroundColor' => '#10b981',
                        'borderColor' => '#10b981',
                    ],
                    [
                        'label' => 'Promotable',
                        'data' => $promotableData,
                        'backgroundColor' => '#f59e0b',
                        'borderColor' => '#f59e0b',
                    ],
                    [
                        'label' => 'Non Talent',
                        'data' => $nonTalentData,
                        'backgroundColor' => '#ef4444',
                        'borderColor' => '#ef4444',
                    ],
                ],
                'labels' => $jobLevels,
            ];
        });
    }

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getOptions(): array
    {
        return [
            'scales' => [
                'x' => [
                    'stacked' => false,
                ],
                'y' => [
                    'stacked' => false,
                ],
            ],
        ];
    }
}
