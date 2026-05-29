<?php

namespace App\Filament\Resources\Support;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;

final class CmsTableActions
{
    public static function record(bool $softDeletes = true): array
    {
        return [
            ViewAction::make(),
            EditAction::make(),
            DeleteAction::make(),
            ...($softDeletes ? [
                RestoreAction::make(),
                ForceDeleteAction::make(),
            ] : []),
        ];
    }

    public static function bulk(bool $softDeletes = true): array
    {
        return [
            BulkActionGroup::make([
                DeleteBulkAction::make(),
                ...($softDeletes ? [
                    RestoreBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                ] : []),
            ]),
        ];
    }
}
