<?php

use App\Models\Gallery;
use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

new class extends Component
{
    #[Url(as: 'gallery')]
    public string $gallery = '';

    #[Computed]
    public function galleries(): Collection
    {
        return Gallery::query()
            ->published()
            ->ordered()
            ->oldest()
            ->get();
    }

    #[Computed]
    public function selectedGallery(): ?Gallery
    {
        if ($this->gallery === '') {
            return null;
        }

        return $this->galleries->firstWhere('slug', $this->gallery);
    }

    #[Computed]
    public function galleryAssets(): Collection
    {
        $galleries = $this->selectedGallery instanceof Gallery
            ? collect([$this->selectedGallery])
            : $this->galleries;

        return $galleries
            ->flatMap(fn (Gallery $gallery): Collection => $gallery
                ->media()
                ->latest()
                ->get()
                ->filter(fn (Media $media): bool => $this->isDisplayableMedia($media))
                ->map(fn (Media $media): array => [
                    'gallery' => $gallery,
                    'media' => $media,
                ]))
            ->values();
    }

    protected function isDisplayableMedia(Media $media): bool
    {
        $mimeType = (string) $media->mime_type;

        return str_starts_with($mimeType, 'image/')
            || str_starts_with($mimeType, 'video/');
    }
};
