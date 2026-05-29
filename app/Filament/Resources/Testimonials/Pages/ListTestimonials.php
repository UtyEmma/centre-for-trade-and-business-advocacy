<?php

namespace App\Filament\Resources\Testimonials\Pages;

use App\Filament\Resources\Support\Pages\CmsListRecords;
use App\Filament\Resources\Testimonials\TestimonialResource;

class ListTestimonials extends CmsListRecords
{
    protected static string $resource = TestimonialResource::class;
}
