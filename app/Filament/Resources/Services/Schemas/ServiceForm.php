<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('slug')
                    ->required()
                    ->maxLength(100),
                TextInput::make('title_en')
                    ->required()
                    ->label('Title (EN)')
                    ->maxLength(255),
                TextInput::make('title_bn')
                    ->required()
                    ->label('Title (BN)')
                    ->maxLength(255),
                Textarea::make('summary_en')
                    ->label('Summary (EN)')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('summary_bn')
                    ->label('Summary (BN)')
                    ->required()
                    ->columnSpanFull(),
                TagsInput::make('features_en')
                    ->label('Features (EN)')
                    ->columnSpanFull(),
                TagsInput::make('features_bn')
                    ->label('Features (BN)')
                    ->columnSpanFull(),
                Toggle::make('is_active')
                    ->default(true)
                    ->required(),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->default(0),
            ]);
    }
}
