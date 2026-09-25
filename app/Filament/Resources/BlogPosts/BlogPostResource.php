<?php

namespace App\Filament\Resources\BlogPosts;

use App\Filament\Resources\BlogPosts\Pages\CreatePost;
use App\Filament\Resources\BlogPosts\Pages\EditPost;
use App\Filament\Resources\BlogPosts\Pages\ListPosts;
use App\Models\BlogPost;
use BackedEnum;
use UnitEnum;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class BlogPostResource extends Resource
{
    protected static ?string $model = BlogPost::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentText;

    protected static string|UnitEnum|null $navigationGroup = 'Content';

    protected static ?string $navigationLabel = 'Blog Posts';

    protected static ?string $modelLabel = 'Blog Post';

    protected static ?string $pluralModelLabel = 'Blog Posts';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('title_en')
                ->label('Title (EN)')
                ->required()
                ->maxLength(255)
                ->columnSpanFull(),
            TextInput::make('title_bn')
                ->label('Title (BN)')
                ->required()
                ->maxLength(255)
                ->columnSpanFull(),
            TextInput::make('slug')
                ->label('Slug (URL)')
                ->helperText('খালি রাখলে English title থেকে নিজে তৈরি হবে।')
                ->maxLength(120)
                ->unique(ignoreRecord: true)
                ->columnSpanFull(),
            Textarea::make('excerpt_en')
                ->label('Excerpt (EN)')
                ->rows(2)
                ->columnSpanFull(),
            Textarea::make('excerpt_bn')
                ->label('Excerpt (BN)')
                ->rows(2)
                ->columnSpanFull(),
            Textarea::make('body_en')
                ->label('Body (EN)')
                ->rows(10)
                ->required()
                ->columnSpanFull()
                ->helperText('Plain text. Paragraph আলাদা করতে একটি খালি লাইন দিন।'),
            Textarea::make('body_bn')
                ->label('Body (BN)')
                ->rows(10)
                ->required()
                ->columnSpanFull()
                ->helperText('Plain text. Paragraph আলাদা করতে একটি খালি লাইন দিন।'),
            DateTimePicker::make('published_at')
                ->label('Publish date')
                ->required()
                ->default(now()),
            Toggle::make('is_active')
                ->label('Active')
                ->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title_en')->label('Title')->searchable()->sortable(),
                TextColumn::make('slug')->searchable(),
                TextColumn::make('published_at')->label('Published')->dateTime('d M Y H:i')->sortable(),
                IconColumn::make('is_active')->boolean(),
            ])
            ->defaultSort('published_at', 'desc');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title_en'] ?? $data['title_bn'] ?? '');
        }

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title_en'] ?? $data['title_bn'] ?? '');
        }

        return $data;
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPosts::route('/'),
            'create' => CreatePost::route('/create'),
            'edit' => EditPost::route('/{record}/edit'),
        ];
    }
}
