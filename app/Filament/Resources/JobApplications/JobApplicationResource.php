<?php

namespace App\Filament\Resources\JobApplications;

use App\Filament\Resources\JobApplications\Pages\ListApplications;
use App\Models\JobApplication;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use UnitEnum;

class JobApplicationResource extends Resource
{
    protected static ?string $model = JobApplication::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedClipboardDocumentList;

    protected static string|UnitEnum|null $navigationGroup = 'Leads';

    protected static ?string $navigationLabel = 'Job Applications';

    protected static ?string $modelLabel = 'Application';

    protected static ?string $pluralModelLabel = 'Applications';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('phone')
                    ->label('Phone')
                    ->searchable()
                    ->copyable(),
                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('position')
                    ->label('Role')
                    ->badge(),
                TextColumn::make('has_sales_experience')
                    ->label('Sales Exp.')
                    ->badge(),
                TextColumn::make('years_experience')
                    ->label('Years')
                    ->toggleable(),
                TextColumn::make('software_experience')
                    ->label('Software')
                    ->wrap()
                    ->toggleable(),
                TextColumn::make('work_type')
                    ->label('Type')
                    ->badge()
                    ->toggleable(),
                TextColumn::make('work_from_home')
                    ->label('WFH')
                    ->toggleable(),
                TextColumn::make('commission_based')
                    ->label('Commission')
                    ->badge()
                    ->toggleable(),
                TextColumn::make('expected_salary')
                    ->label('Expected Salary')
                    ->toggleable(),
                TextColumn::make('address')
                    ->label('Address')
                    ->wrap()
                    ->toggleable(),
                TextColumn::make('home_address')
                    ->label('Home Address')
                    ->wrap()
                    ->toggleable(),
                TextColumn::make('created_at')
                    ->label('Applied At')
                    ->dateTime()
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => ListApplications::route('/'),
        ];
    }
}
