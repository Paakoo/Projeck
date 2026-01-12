<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmployeeResource\Pages;
use App\Filament\Resources\EmployeeResource\RelationManagers;
use App\Models\Employee;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    
    protected static ?string $navigationLabel = 'Employees';
    
    protected static ?string $navigationGroup = 'Talent Management';
    
    protected static ?int $navigationSort = 1;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function canAccess(): bool
    {
        /** @var User|null $user */
        $user = Auth::user();
        return $user?->isAdmin() ?? false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('division_id')
                    ->relationship('division', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),
                Forms\Components\TextInput::make('position')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('job_level')
                    ->options([
                        'BOD-1' => 'BOD-1',
                        'BOD-2' => 'BOD-2',
                        'BOD-3' => 'BOD-3',
                        'BOD-4' => 'BOD-4',
                    ])
                    ->required(),
                Forms\Components\Select::make('talent_category')
                    ->options([
                        'High Potential' => 'High Potential',
                        'Promotable' => 'Promotable',
                        'Non Talent' => 'Non Talent',
                        'Regular' => 'Regular',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('performance_score')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(100),
                Forms\Components\TextInput::make('potential_score')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(100),
                Forms\Components\Toggle::make('is_promotable')
                    ->default(false),
                Forms\Components\Textarea::make('notes')
                    ->maxLength(65535)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('division.name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('position')
                    ->searchable(),
                Tables\Columns\TextColumn::make('job_level')
                    ->badge()
                    ->sortable(),
                Tables\Columns\TextColumn::make('talent_category')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'High Potential' => 'success',
                        'Promotable' => 'warning',
                        'Non Talent' => 'danger',
                        'Regular' => 'gray',
                    })
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_promotable')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('division')
                    ->relationship('division', 'name'),
                Tables\Filters\SelectFilter::make('talent_category')
                    ->options([
                        'High Potential' => 'High Potential',
                        'Promotable' => 'Promotable',
                        'Non Talent' => 'Non Talent',
                        'Regular' => 'Regular',
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }
}
