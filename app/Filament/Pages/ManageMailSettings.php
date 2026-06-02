<?php

namespace App\Filament\Pages;

use App\Filament\Navigation\NavigationGroups;
use App\Mail\MailSettingsTestMail;
use App\Settings\MailSettings;
use App\Support\MailConfiguration;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Mail;
use Throwable;
use UnitEnum;

class ManageMailSettings extends SettingsPage
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedEnvelope;

    protected static string|UnitEnum|null $navigationGroup = NavigationGroups::EMAIL_MARKETING;

    protected static ?string $navigationLabel = 'Mail Settings';

    protected static ?int $navigationSort = 100;

    protected static ?string $title = 'Mail Settings';

    protected static string $settings = MailSettings::class;

    public function form(Schema $schema): Schema
    {
        return $schema
            ->columns(3)
            ->components([
                Section::make('Delivery')
                    ->schema([
                        Select::make('mailer')
                            ->options([
                                'log' => 'Log',
                                'smtp' => 'SMTP',
                            ])
                            ->native(false)
                            ->live()
                            ->required(),
                        TextInput::make('from_name')
                            ->label('From name')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('from_address')
                            ->label('From email')
                            ->email()
                            ->required()
                            ->maxLength(255),
                        TextInput::make('reply_to_name')
                            ->label('Reply-to name')
                            ->maxLength(255),
                        TextInput::make('reply_to_address')
                            ->label('Reply-to email')
                            ->email()
                            ->maxLength(255),
                    ])
                    ->columns(2)
                    ->columnSpan(2),
                Section::make('SMTP')
                    ->schema([
                        TextInput::make('smtp_host')
                            ->label('Host')
                            ->required(fn (Get $get): bool => $get('mailer') === 'smtp')
                            ->maxLength(255),
                        TextInput::make('smtp_port')
                            ->label('Port')
                            ->numeric()
                            ->integer()
                            ->required(fn (Get $get): bool => $get('mailer') === 'smtp'),
                        Select::make('smtp_scheme')
                            ->label('Scheme')
                            ->options([
                                null => 'None',
                                'tls' => 'TLS',
                                'ssl' => 'SSL',
                            ])
                            ->native(false),
                        TextInput::make('smtp_username')
                            ->label('Username')
                            ->maxLength(255),
                        TextInput::make('smtp_password')
                            ->label('Password')
                            ->password()
                            ->revealable()
                            ->dehydrated(fn (?string $state): bool => filled($state))
                            ->helperText('Leave blank to keep the current password.'),
                    ])
                    ->columns(1)
                    ->visible(fn (Get $get): bool => $get('mailer') === 'smtp')
                    ->columnSpan(1),
            ]);
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['smtp_password'] = null;

        return $data;
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('sendTestEmail')
                ->label('Send test email')
                ->schema([
                    TextInput::make('email')
                        ->email()
                        ->required(),
                ])
                ->action(function (array $data): void {
                    try {
                        MailConfiguration::configure();

                        Mail::to($data['email'])->send(new MailSettingsTestMail);

                        Notification::make()
                            ->title('Test email sent')
                            ->success()
                            ->send();
                    } catch (Throwable $exception) {
                        report($exception);

                        Notification::make()
                            ->title('Test email failed')
                            ->body($exception->getMessage())
                            ->danger()
                            ->send();
                    }
                }),
        ];
    }
}
