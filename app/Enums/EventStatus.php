<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum EventStatus: string implements HasColor, HasLabel
{
    case Draft = 'draft';
    case Scheduled = 'scheduled';
    case Open = 'open';
    case Closed = 'closed';
    case Cancelled = 'cancelled';
    case Completed = 'completed';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Draft => 'Draft',
            self::Scheduled => 'Scheduled',
            self::Open => 'Open',
            self::Closed => 'Closed',
            self::Cancelled => 'Cancelled',
            self::Completed => 'Completed',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::Draft => 'gray',
            self::Scheduled => 'info',
            self::Open => 'success',
            self::Closed => 'warning',
            self::Cancelled => 'danger',
            self::Completed => 'primary',
        };
    }
}
