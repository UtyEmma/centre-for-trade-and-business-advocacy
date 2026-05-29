<?php

namespace App\Filament\Resources\Support;

use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

final class CmsTable
{
    public static function withSoftDeletes(Table $table): Table
    {
        return $table->modifyQueryUsing(fn (Builder $query): Builder => $query
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]));
    }
}
