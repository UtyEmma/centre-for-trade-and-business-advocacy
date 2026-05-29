<?php

namespace App\Filament\Resources\Faqs\Pages;

use App\Filament\Resources\Faqs\FaqResource;
use App\Filament\Resources\Support\Pages\CmsEditRecord;

class EditFaq extends CmsEditRecord
{
    protected static string $resource = FaqResource::class;
}
