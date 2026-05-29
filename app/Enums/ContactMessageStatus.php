<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum ContactMessageStatus: string implements HasColor, HasLabel
{
    case New = 'new';
    case InReview = 'in_review';
    case Responded = 'responded';
    case Closed = 'closed';
    case Spam = 'spam';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::New => 'New',
            self::InReview => 'In review',
            self::Responded => 'Responded',
            self::Closed => 'Closed',
            self::Spam => 'Spam',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::New => 'info',
            self::InReview => 'warning',
            self::Responded => 'success',
            self::Closed => 'gray',
            self::Spam => 'danger',
        };
    }
}
