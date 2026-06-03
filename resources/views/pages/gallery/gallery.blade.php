<main>
    <x-partials::page.header
        title="Gallery"
        description="Explore highlights from our advocacy work, events, research engagements, and stakeholder programmes."
        image="{{ asset('assets/images/banners/events-page-banner.png') }}"
    />

    <section class="tp-blog-area pt-100 pb-100">
        <div class="container col-md-10 mx-auto">
            @php
                $selectedGallery = $this->selectedGallery
            @endphp

            <div class="mb-10 flex flex-wrap col-md-10 mx-auto justify-center gap-3">
                <a
                    href="{{ route('gallery') }}"
                    class="inline-flex items-center gap-2 rounded border px-5! py-3 text-sm font-medium leading-none transition duration-200 {{ $gallery === '' ? 'border-secondary bg-secondary text-white ' : 'border-secondary/15 text-secondary hover:border-secondary hover:bg-secondary hover:text-white' }}"
                >
                    All
                </a>

                @foreach ($this->galleries as $galleryRecord)
                    <a
                        href="{{ route('gallery', ['gallery' => $galleryRecord->slug]) }}"
                        class="inline-flex items-center gap-2 rounded border px-5! py-3 text-sm font-medium leading-none transition duration-200 {{ $gallery === $galleryRecord->slug ? 'border-secondary bg-secondary text-white [&>span]:text-white/75' : 'border-secondary/15 text-secondary hover:border-secondary hover:bg-secondary hover:text-white [&>span]:text-secondary/60 hover:[&>span]:text-white/75' }}"
                        wire:key="gallery-filter-{{ $galleryRecord->id }}"
                    >
                        {{ $galleryRecord->name }}
                        <span>{{ $galleryRecord->media_count }}</span>
                    </a>
                @endforeach
            </div>

            @if ($selectedGallery && filled($selectedGallery->description))
                <div class="col-md-10 mx-auto pb-5! mt-10 text-center ">
                    <p class="m-0 text-gray-500 text-lg">{{ $selectedGallery->description }}</p>
                </div>
            @endif

            @if ($this->galleryAssets->isNotEmpty())
                <div class="gallery-masonry w-full mt-20" data-gallery-masonry>
                    <div class="gallery-masonry-sizer w-full md:w-[calc((100%_-_24px)/2)] xl:w-[calc((100%_-_48px)/3)]"></div>
                  @foreach ($this->galleryAssets as $galleryAsset)
                        <x-gallery.item
                            :gallery-record="$galleryAsset['gallery']"
                            :media="$galleryAsset['media']"
                            wire:key="gallery-media-{{ $galleryAsset['media']->id }}"
                        />
                    @endforeach
                </div>
                {{-- </div> --}}
            @else
                <div class="rounded-lg border border-dashed border-secondary/20 p-5! text-center md:p-10!">
                    <h3 class="mb-2.5 text-[28px] font-extrabold text-secondary">No gallery items yet</h3>
                    <p class="m-0 text-[#222f30]/70">Please check back later.</p>
                </div>
            @endif
        </div>
    </section>
</main>
