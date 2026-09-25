<?php

namespace App\Filament\Resources\SocialLinks;

use App\Filament\Resources\SocialLinks\Pages\CreateSocialLink;
use App\Filament\Resources\SocialLinks\Pages\EditSocialLink;
use App\Filament\Resources\SocialLinks\Pages\ListSocialLinks;
use App\Models\SocialLink;
use BackedEnum;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use UnitEnum;

class SocialLinkResource extends Resource
{
    protected static ?string $model = SocialLink::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedShare;

    protected static string|UnitEnum|null $navigationGroup = 'Settings';

    protected static ?string $navigationLabel = 'Social Links';

    protected static ?string $modelLabel = 'Social Link';

    protected static ?string $pluralModelLabel = 'Social Links';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('name')
                ->label('Name')
                ->required()
                ->maxLength(60),
            Select::make('icon')
                ->label('Icon')
                ->required()
                ->options([
                    'facebook' => 'Facebook',
                    'youtube' => 'YouTube',
                    'linkedin' => 'LinkedIn',
                    'instagram' => 'Instagram',
                    'x' => 'X (Twitter)',
                    'tiktok' => 'TikTok',
                    'whatsapp' => 'WhatsApp',
                    'telegram' => 'Telegram',
                    'website' => 'Website',
                ]),
            TextInput::make('url')
                ->label('URL')
                ->url()
                ->maxLength(255)
                ->columnSpanFull(),
            TextInput::make('sort_order')
                ->label('Sort order')
                ->numeric()
                ->minValue(0)
                ->default(0),
            Toggle::make('is_active')
                ->label('Active')
                ->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('icon')->sortable(),
                TextColumn::make('url')->limit(40),
                IconColumn::make('is_active')->boolean(),
            ])
            ->defaultSort('sort_order');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSocialLinks::route('/'),
            'create' => CreateSocialLink::route('/create'),
            'edit' => EditSocialLink::route('/{record}/edit'),
        ];
    }
}
