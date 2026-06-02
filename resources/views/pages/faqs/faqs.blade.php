
<main>
    <x-partials::page.header 
        title="Frequently Asked Questions"
        description="Clear answers to common questions about our work, partnerships, policy engagement, publications, events, and approach to sustainable reform."
        :breadcrumbs="[
            ['name' => 'Frequently Asked Questions'],
        ]" 
        image="{{ asset('assets/images/banners/frequently-asked-question-page-banner.png') }}"
    />

    <x-sections::faqs 
        :faqs="$this->faqs"
    />
</main>