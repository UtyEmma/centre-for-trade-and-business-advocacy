<?php

namespace App\Filament\Resources\Support\Pages;

use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

abstract class CmsViewRecord extends ViewRecord
{
    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
