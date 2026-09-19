<?php

namespace App\Filament\Resources\PageContents\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PageContentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('key')
                    ->required()
                    ->maxLength(100)
                    ->disabledOn('edit'),
                TextInput::make('title_en')
                    ->required()
                    ->label('Title (EN)'),
                TextInput::make('title_bn')
                    ->required()
                    ->label('Title (BN)'),
                Textarea::make('body_en')
                    ->label('Body (EN)')
                    ->rows(6)
                    ->columnSpanFull(),
                Textarea::make('body_bn')
                    ->label('Body (BN)')
                    ->rows(6)
                    ->columnSpanFull(),
                TextInput::make('meta_title_en')
                    ->label('Meta Title (EN)'),
                TextInput::make('meta_title_bn')
                    ->label('Meta Title (BN)'),
                Textarea::make('meta_description_en')
                    ->label('Meta Description (EN)')
                    ->rows(4)
                    ->columnSpanFull(),
                Textarea::make('meta_description_bn')
                    ->label('Meta Description (BN)')
                    ->rows(4)
                    ->columnSpanFull(),
            ]);
    }
}
