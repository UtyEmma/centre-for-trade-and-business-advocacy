<?php

namespace App\Filament\Resources\Comments\Schemas;

use App\Enums\CommentStatus;
use App\Models\Post;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\MorphToSelect;
use Filament\Forms\Components\MorphToSelect\Type;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class CommentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(3)
            ->components([
                Section::make('Comment')
                    ->schema([
                        Select::make('user_id')
                            ->label('User')
                            ->relationship('user', 'name')
                            ->searchable()
                            ->preload(),
                        TextInput::make('name')
                            ->maxLength(255),
                        TextInput::make('email')
                            ->email()
                            ->maxLength(255),
                        TextInput::make('website_url')
                            ->label('Website URL')
                            ->url()
                            ->maxLength(255),
                        RichEditor::make('comment')
                            ->required()
                            ->columnSpanFull(),
                    ])
                    ->columns(2)
                    ->columnSpan(2),
                Section::make('Settings')
                    ->schema([
                        MorphToSelect::make('commentable')
                            ->types([
                                Type::make(Post::class)
                                    ->label('Post')
                                    ->titleAttribute('title'),
                            ])
                            ->searchable()
                            ->preload()
                            ->required(),
                        Select::make('comment_id')
                            ->label('Parent comment')
                            ->relationship('parent', 'comment')
                            ->searchable()
                            ->preload(),
                        Select::make('status')
                            ->options(CommentStatus::class)
                            ->default(CommentStatus::Pending->value)
                            ->required(),
                        DateTimePicker::make('approved_at')
                            ->seconds(false),
                    ])
                    ->columns(1)
                    ->columnSpan(1),
            ]);
    }
}
