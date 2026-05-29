<?php

namespace App\Filament\Resources\Support\Pages;

use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\SoftDeletes;

abstract class CmsEditRecord extends EditRecord
{
    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
            ...($this->resourceUsesSoftDeletes() ? [
                ForceDeleteAction::make(),
                RestoreAction::make(),
            ] : []),
        ];
    }

    protected function resourceUsesSoftDeletes(): bool
    {
        return in_array(SoftDeletes::class, class_uses_recursive(static::getResource()::getModel()), true);
    }
}
