<?php

namespace App\Filament\Resources\Posts\Schemas;

use App\Enums\PostStatus;
use App\Filament\Resources\Support\CmsForm;
use App\Models\Post;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Spatie\Tags\Tag;

final class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(3)
            ->components([
                Section::make('Post')
                    ->schema([
                        ...CmsForm::titleAndSlug(),
                        Textarea::make('excerpt')
                            ->maxLength(65535)
                            ->columnSpanFull(),
                        RichEditor::make('content')
                            ->columnSpanFull(),
                        TagsInput::make('tags')
                            ->suggestions(fn (): array => Tag::query()
                                ->ordered()
                                ->get()
                                ->map(fn (Tag $tag): string => (string) $tag->name)
                                ->all())
                            ->formatStateUsing(fn (?Post $record): array => $record?->tags
                                ->map(fn (Tag $tag): string => (string) $tag->name)
                                ->all() ?? [])
                            ->columnSpanFull(),
                        CmsForm::imageUpload('featured_image', 'Featured image')
                            ->columnSpanFull(),
                    ])
                    ->columns(2)
                    ->columnSpan(2),
                Section::make('Settings')
                    ->schema([
                        Select::make('post_category_id')
                            ->label('Category')
                            ->relationship('category', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),
                        Select::make('user_id')
                            ->label('Author')
                            ->relationship('author', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),
                        Select::make('status')
                            ->options(PostStatus::class)
                            ->default(PostStatus::Draft->value)
                            ->required(),
                        DateTimePicker::make('published_at')
                            ->seconds(false),
                        Toggle::make('allow_comments')
                            ->label('Allow comments')
                            ->default(true),
                        Toggle::make('is_featured')
                            ->label('Featured')
                            ->default(false),
                    ])
                    ->columns(1)
                    ->columnSpan(1),
                CmsForm::seo(),
            ]);
    }
}
