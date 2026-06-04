<main>
    <x-partials::page.header 
        title="Case Studies"
        description="Explore our case studies to see how we've helped clients achieve remarkable results across various industries."
        image="{{ asset('assets/images/banners/case-study-page-banner.png') }}"
    />

    <x-sections::case-study.index :casestudies="$this->caseStudies" />
</main>