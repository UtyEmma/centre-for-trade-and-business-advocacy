<?php

namespace App\Filament\Resources\JobApplications\Actions;

use App\Models\JobApplication;
use Filament\Actions\Action;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

final class DownloadJobApplicationFileAction
{
    public static function make(string $name, string $pathAttribute, string $filenameAttribute, string $label): Action
    {
        return Action::make($name)
            ->label($label)
            ->icon(Heroicon::OutlinedArrowDownTray)
            ->color('gray')
            ->visible(fn (JobApplication $record): bool => filled($record->{$pathAttribute})
                && Storage::disk('local')->exists($record->{$pathAttribute}))
            ->action(fn (JobApplication $record): StreamedResponse => Storage::disk('local')->download(
                $record->{$pathAttribute},
                $record->{$filenameAttribute} ?: basename($record->{$pathAttribute}),
            ));
    }
}
