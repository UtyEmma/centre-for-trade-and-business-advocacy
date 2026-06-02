<main>
    <x-partials::page.header 
        title="Case Studies"
        description="Explore our case studies to see how we've helped clients achieve remarkable results across various industries. From driving a 45% increase in sales for a retail partner to accelerating decarbonization in the farming supply chain, our case studies showcase our expertise and impact."
        image="{{ asset('assets/images/banners/case-study-page-banner.png') }}"
    />

    <x-sections::case-study.index :casestudies="$this->caseStudies" />
</main>