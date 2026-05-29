<?php

namespace App\Filament\Resources\Support;

use Filament\Forms\Components\DatePicker;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

final class DateRangeFilter
{
    public static function make(string $column, ?string $label = null): Filter
    {
        return Filter::make($column)
            ->label($label ?? str($column)->headline()->toString())
            ->schema([
                DatePicker::make('from')
                    ->label('From'),
                DatePicker::make('until')
                    ->label('Until'),
            ])
            ->query(fn (Builder $query, array $data): Builder => $query
                ->when($data['from'] ?? null, fn (Builder $query, string $date): Builder => $query->whereDate($column, '>=', $date))
                ->when($data['until'] ?? null, fn (Builder $query, string $date): Builder => $query->whereDate($column, '<=', $date)));
    }
}
