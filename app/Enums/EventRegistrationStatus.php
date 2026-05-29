<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum EventRegistrationStatus: string implements HasColor, HasLabel
{
    case Pending = 'pending';
    case Confirmed = 'confirmed';
    case Waitlisted = 'waitlisted';
    case Cancelled = 'cancelled';
    case Attended = 'attended';
    case NoShow = 'no_show';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Pending => 'Pending',
            self::Confirmed => 'Confirmed',
            self::Waitlisted => 'Waitlisted',
            self::Cancelled => 'Cancelled',
            self::Attended => 'Attended',
            self::NoShow => 'No show',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::Pending => 'warning',
            self::Confirmed => 'success',
            self::Waitlisted => 'info',
            self::Cancelled => 'danger',
            self::Attended => 'primary',
            self::NoShow => 'gray',
        };
    }
}
