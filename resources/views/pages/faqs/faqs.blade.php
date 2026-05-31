
<main>
    <x-partials::page.header 
        title="Frequently Asked Questions"
        :breadcrumbs="[
            ['name' => 'Frequently Asked Questions'],
        ]" 
        image="{{ asset('assets/images/banners/frequently-asked-question-page-banner.png') }}"
    />

    <x-sections::faqs 
        :faqs="$this->faqs"
    />
</main>