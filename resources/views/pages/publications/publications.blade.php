<main>
    <x-partials::page.header 
        title="{{ $publicationType->name }}"
        description="{{ $publicationType->description }}"
        :breadcrumbs="[
            ['name' => $publicationType->name, 'url' => route('publications', $publicationType)],
        ]"
        image="{{ asset('assets/images/banners/publications-page-banner.png') }}"
    />

    <div class="tp-worksheet-ptb tp-worksheet-style tp-sec-ptb pt-135 pb-115">
        <div class="container col-md-10 mx-auto">
            <div class="row g-5">
                <div class="col-md-8 flex flex-col gap-4">
                    <x-sections::publications.list 
                        :publications="$this->publications"
                        :type="$publicationType"
                    />
                </div>

                <div class="col-md-4">
                    @include('partials.publications.sidebar')
                    {{-- <div class="tp-sidebar-wrapper mb-30">
                        <div class="tp-sidebar-widget mb-45">
                            <div class="tp-sidebar-search">
                                <div>
                                    <div class="tp-sidebar-search-input">
                                    <input wire:model.live="search" type="text" placeholder="Search here" /> 
                                    <button type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                            <path d="M1 17L4.86666 13.1333M2.77727 8.1111C2.77727 12.0385 5.96102 15.2222 9.88837 15.2222C13.8157 15.2222 16.9995 12.0385 16.9995 8.1111C16.9995 4.18375 13.8157 1 9.88837 1C5.96102 1 2.77727 4.18375 2.77727 8.1111Z" stroke="#222F30" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    <x-sections::faqs  />
</main>