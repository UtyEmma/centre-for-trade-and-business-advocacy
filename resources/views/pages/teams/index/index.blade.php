<main>
    <x-partials::page.header 
        title="Meet Our Team" 
        description="Meet the people and institutional leadership guiding our work in research, advocacy, policy engagement, and sustainable market reform."
        :breadcrumbs="[
            ['name' => 'Meet Our Team'],
        ]" 
        image="{{ asset('assets/images/banners/teams-banner.png') }}"
    />

    <x-sections::teams.area 
        :teamMembers="$this->teamMembers"
    />

    <x-sections::home.banner
        headline="Guided by expertise. Driven by public purpose."
        description="Our leadership and programme structure is designed to support credible research, informed advocacy, institutional engagement, and practical reform outcomes."
    />

    <x-sections::home.marquee />


    <!-- funfact area start -->
    <x-sections::teams.structure />
</main>