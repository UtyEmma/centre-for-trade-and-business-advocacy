<main>

    <x-partials::page.header
        title="Careers"
        description="Join a purpose-driven organisation working to advance evidence-based reform, stronger institutions, and equitable markets for sustainable development."
        image="{{ asset('assets/images/banners/careers-page-banner.png') }}"
    />

    <x-sections::careers.join-area />

    <x-sections::careers.why-join />

    <x-sections::careers.positions :jobs="$this->jobs" />
</main>