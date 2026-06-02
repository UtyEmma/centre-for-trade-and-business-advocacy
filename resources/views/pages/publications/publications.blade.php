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
                    <x-partials::publications.sidebar />
                </div>
            </div>
        </div>
    </div>

    <x-sections::faqs  />
</main>