<div class="tp-at-download-item">
    <div class="flex flex-col md:flex-row gap-3">
        <div class="shrink-0 md:w-1/4 tp-at-download-item-thumb mb-30">
            <img class="radius-6 aspect-4/3! object-cover" src="{{ $publication->image }}" alt="">
        </div>

        <div class="flex-1">
            <div class="tp-at-download-item-content mb-35">
                <h3 class="tp-at-download-item-title text-lg!">{{ $publication->title }}</h3>
                <p>{{$publication->summary}}</p>
            </div>
            <div class="tp-at-download-item-btn ">
                <a href="{{ $publication->document_url }}" class="tp-at-download-btn">Access the report <x-phosphor-download-simple class="size-5" />
                </a>
            </div>
        </div>
    </div>

</div>