@props([
    'image' => $publication->image,
    'title' => $publication->title,
    'summary' => $publication->summary,
    'url' => $publication->document_url,
    'button_text' => $type->action_text ?? 'Access the report'
])

<div class="tp-at-download-item">
    <div class="flex flex-col md:flex-row gap-3">
        @if ($image)
            <div class="shrink-0 md:w-1/4 tp-at-download-item-thumb mb-30">
                <img class="radius-6 aspect-square! object-cover" src="{{ $image }}" alt="">
            </div>
        @endif

        <div class="flex-1">
            <div class="tp-at-download-item-content mb-35 pt-1!">
                <h3 class="tp-at-download-item-title text-xl!">{{ $title }}</h3>
                <p>{{$summary}}</p>
            </div>
            <div class="tp-at-download-item-btn ">
                <a href="{{ $url }}" target="__blank" class="tp-at-download-btn text-primary!">
                    {{ $button_text }} <x-phosphor-download-simple class="size-5" />
                </a>
            </div>
        </div>
    </div>

</div>