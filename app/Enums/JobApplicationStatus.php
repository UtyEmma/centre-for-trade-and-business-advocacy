<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum JobApplicationStatus: string implements HasColor, HasLabel
{
    case New = 'new';
    case InReview = 'in_review';
    case Shortlisted = 'shortlisted';
    case Rejected = 'rejected';
    case Hired = 'hired';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::New => 'New',
            self::InReview => 'In review',
            self::Shortlisted => 'Shortlisted',
            self::Rejected => 'Rejected',
            self::Hired => 'Hired',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::New => 'info',
            self::InReview => 'warning',
            self::Shortlisted => 'primary',
            self::Rejected => 'danger',
            self::Hired => 'success',
        };
    }
}
