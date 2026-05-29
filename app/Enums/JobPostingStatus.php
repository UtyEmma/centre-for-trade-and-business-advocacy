<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum JobPostingStatus: string implements HasColor, HasLabel
{
    case Draft = 'draft';
    case Open = 'open';
    case Closed = 'closed';
    case Archived = 'archived';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Draft => 'Draft',
            self::Open => 'Open',
            self::Closed => 'Closed',
            self::Archived => 'Archived',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::Draft => 'gray',
            self::Open => 'success',
            self::Closed => 'warning',
            self::Archived => 'danger',
        };
    }
}
