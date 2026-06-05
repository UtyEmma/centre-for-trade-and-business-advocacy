<main>
    <x-partials::page.header 
        title="{{ $publicationType->name }}"
        description="{{ $publicationType->description }}"
        :breadcrumbs="[
            ['name' => $publicationType->name, 'url' => route('publications', $publicationType)],
        ]"
        image="{{ asset('assets/images/banners/publications-page-banner.png') }}"
    />

    <div class="tp-worksheet-ptb tp-worksheet-style tp-sec-ptb md:pt-[100px]! pb-115">
        <div class="container col-md-10 mx-auto">
            <div class="row g-5">
                <div class="col-md-8 flex flex-col gap-4">
                    <x-sections::publications.list 
                        :publications="$this->publications"
                        :type="$publicationType"
                    />

                    <x-pagination :paginator="$this->publications" />
                </div>

                <div class="col-md-4 order-first order-md-last">
                    <x-partials::publications.sidebar :publicationType="$publicationType" />
                </div>
            </div>
        </div>
    </div>

    <x-sections::faqs  />
</main>