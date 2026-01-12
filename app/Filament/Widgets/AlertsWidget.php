<?php

namespace App\Filament\Widgets;

use App\Models\Alert;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class AlertsWidget extends BaseWidget
{
    protected static ?int $sort = 4;
    protected int | string | array $columnSpan = 'full';
    
    // Lazy load widget
    protected static bool $isLazy = true;

    public function table(Table $table): Table
    {
        return $table
            ->heading('Alerts & Notifications')
            ->query(
                Alert::query()
                    ->where('is_read', false)
                    ->latest()
                    ->limit(10) // Limit to 10 latest alerts
            )
            ->columns([
                Tables\Columns\IconColumn::make('type')
                    ->icon(fn (string $state): string => match ($state) {
                        'vacancy' => 'heroicon-o-briefcase',
                        'promotion' => 'heroicon-o-arrow-trending-up',
                        'assessment' => 'heroicon-o-clipboard-document-check',
                        'talent_entry' => 'heroicon-o-user-plus',
                        default => 'heroicon-o-bell',
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'vacancy' => 'warning',
                        'promotion' => 'info',
                        'assessment' => 'danger',
                        'talent_entry' => 'success',
                        default => 'gray',
                    }),
                
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->weight('bold'),
                
                Tables\Columns\TextColumn::make('message')
                    ->limit(50)
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Date')
                    ->dateTime()
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\Action::make('mark_read')
                    ->label('Mark as Read')
                    ->icon('heroicon-o-check')
                    ->action(function (Alert $record) {
                        $record->update(['is_read' => true]);
                    })
                    ->requiresConfirmation()
                    ->color('success'),
            ]);
    }
}
