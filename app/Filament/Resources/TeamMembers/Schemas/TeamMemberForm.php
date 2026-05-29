<?php

namespace App\Filament\Resources\TeamMembers\Schemas;

use App\Filament\Resources\Support\CmsForm;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class TeamMemberForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(3)
            ->components([
                Section::make('Team member')
                    ->schema([
                        ...CmsForm::titleAndSlug('name', 'Name'),
                        TextInput::make('role')
                            ->maxLength(255),
                        TextInput::make('email')
                            ->email()
                            ->maxLength(255),
                        TextInput::make('linkedin_url')
                            ->label('LinkedIn URL')
                            ->url()
                            ->maxLength(255),
                        RichEditor::make('bio')
                            ->columnSpanFull(),
                        CmsForm::imageUpload('profile_photo', 'Profile photo'),
                    ])
                    ->columns(2)
                    ->columnSpan(2),
                Section::make('Settings')
                    ->schema([
                        Select::make('team_category_id')
                            ->label('Category')
                            ->relationship('category', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),
                        TextInput::make('sort_order')
                            ->numeric()
                            ->integer()
                            ->default(0)
                            ->required(),
                        Toggle::make('is_published')
                            ->label('Published')
                            ->default(true),
                    ])
                    ->columns(1)
                    ->columnSpan(1),
            ]);
    }
}
