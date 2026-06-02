@props([
    'galleryRecord',
    'media',
])

@php
    $mediaUrl = $media->getUrl();
    $mimeType = (string) $media->mime_type;
    $isVideo = str_starts_with($mimeType, 'video/');
    $mediaLabel = filled($media->name) ? $media->name : $galleryRecord->name;
@endphp

@if (filled($mediaUrl))
    <article
        {{ $attributes->merge([
            'class' => 'gallery-masonry-item mb-6 w-full md:w-[calc((100%_-_24px)/2)] xl:w-[calc((100%_-_48px)/3)]',
            'data-gallery-item' => true,
        ]) }}
    >
        <a
            class="group block overflow-hidden rounded! pb-2"
            data-fslightbox="gallery"
            href="{{ $mediaUrl }}"
            data-type="{{ $isVideo ? 'video' : 'image' }}"
            @if ($isVideo) data-autoplay @endif
            aria-label="Open {{ $mediaLabel }}"
        >
            <span class="relative block overflow-hidden bg-secondary/5">
                @if ($isVideo)
                    <video class="block h-auto w-full transition-transform duration-300 group-hover:scale-[1.035]" muted playsinline preload="metadata">
                        <source src="{{ $mediaUrl }}" type="{{ $mimeType }}">
                    </video>
                @else
                    <img class="block h-auto w-full transition-transform duration-300 group-hover:scale-[1.035]" src="{{ $mediaUrl }}" alt="{{ $mediaLabel }}" loading="lazy">
                @endif

                @if ($isVideo)
                    <span class="absolute left-1/2 top-1/2 inline-flex h-14 w-14 -translate-x-1/2 -translate-y-1/2 items-center justify-center rounded-full bg-primary pl-[3px] text-white" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="20" viewBox="0 0 18 20" fill="none">
                            <path d="M16.5 7.40192C18.5 8.55662 18.5 11.4434 16.5 12.5981L4.5 19.5263C2.5 20.681 0 19.2376 0 16.9282V3.0718C0 0.762395 2.5 -0.681016 4.5 0.473684L16.5 7.40192Z" fill="currentColor"/>
                        </svg>
                    </span>
                @endif
            </span>
        </a>
    </article>
@endif
