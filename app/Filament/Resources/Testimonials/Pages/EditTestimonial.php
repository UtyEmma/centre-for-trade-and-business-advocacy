<?php

namespace App\Filament\Resources\Testimonials\Pages;

use App\Filament\Resources\Support\Pages\CmsEditRecord;
use App\Filament\Resources\Testimonials\TestimonialResource;

class EditTestimonial extends CmsEditRecord
{
    protected static string $resource = TestimonialResource::class;
}
