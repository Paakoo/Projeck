<?php

namespace App\Filament\Widgets;

use App\Models\Division;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class TalentSummaryTable extends BaseWidget
{
    protected static ?int $sort = 3;
    protected int | string | array $columnSpan = 'full';
    
    // Lazy load widget
    protected static bool $isLazy = true;

    public function table(Table $table): Table
    {
        return $table
            ->heading('Talent Summary by Division')
            ->query(
                Division::query()
                    ->withCount([
                        'employees',
                        'employees as high_potential_count' => fn (Builder $query) => 
                            $query->where('talent_category', 'High Potential'),
                        'employees as promotable_count' => fn (Builder $query) => 
                            $query->where('talent_category', 'Promotable'),
                        'employees as non_talent_count' => fn (Builder $query) => 
                            $query->where('talent_category', 'Non Talent'),
                    ])
            )
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Division')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('employees_count')
                    ->label('Total Talent')
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('high_potential_count')
                    ->label('High Potential')
                    ->badge()
                    ->color('success')
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('promotable_count')
                    ->label('Promotable')
                    ->badge()
                    ->color('warning')
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('non_talent_count')
                    ->label('Non Talent')
                    ->badge()
                    ->color('danger')
                    ->sortable(),
            ])
            ->defaultSort('employees_count', 'desc')
            ->paginated(false);
    }
}
