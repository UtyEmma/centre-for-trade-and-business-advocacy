<?php

namespace App\Filament\Resources\Faqs\Pages;

use App\Filament\Resources\Faqs\FaqResource;
use App\Filament\Resources\Support\Pages\CmsListRecords;

class ListFaqs extends CmsListRecords
{
    protected static string $resource = FaqResource::class;
}
