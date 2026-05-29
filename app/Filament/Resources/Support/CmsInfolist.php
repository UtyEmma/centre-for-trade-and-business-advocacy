<?php

namespace App\Filament\Resources\Support;

use Filament\Infolists\Components\TextEntry;

final class CmsInfolist
{
    public static function timestamps(bool $softDeletes = false): array
    {
        return [
            TextEntry::make('created_at')
                ->dateTime()
                ->placeholder('-'),
            TextEntry::make('updated_at')
                ->dateTime()
                ->placeholder('-'),
            ...($softDeletes ? [
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->placeholder('-'),
            ] : []),
        ];
    }
}
