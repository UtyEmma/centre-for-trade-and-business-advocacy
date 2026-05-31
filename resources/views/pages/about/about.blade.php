<main>
    <x-partials::page.header 
        title="About Us"
        description="We are an independent public-interest organisation advancing evidence-based reform for fairer markets, stronger institutions, and sustainable development."
        :breadcrumbs="[
            ['name' => 'About Us'],
        ]"
        image="{{ asset('assets/images/banners/about-us-banner.png') }}"
    />

    <x-sections::about.intro />

    <x-sections::about.mission-vision />

    <x-sections::about.corevalues />

    {{-- <x-sections::about.impact /> --}}

    <x-sections::teams :teamMembers="$this->teamMembers" />

    <x-sections::faqs 
        :faqs="$pageFaqs"
        headline="Clear insights into our purpose, approach, and public-interest reform work"    
    />
</main>