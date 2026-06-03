<main>


    <x-partials::page.header
        :title="$caseStudy->title"
        :description="$caseStudy->summary"
        :breadcrumbs="[
            ['name' => 'Case Studies', 'url' => route('case-studies')],
            ['name' => $caseStudy->title],
        ]"
        :image="$caseStudy->image"
        overlay
    />

    <div class="tp-case-studies-details-ptb tp-sec-ptb pt-110 pb-110">
        <div class="container col-md-10 mx-auto">
            <div class="row g-5">
                <div class="col-lg-8">
                    @if ($caseStudy->image)
                        <div class="tp-case-studies-details-ii-wrap mb-50">
                            <div class="tp-case-studies-details-ii-right mb-30">
                                <div class="tp-case-studies-details-ii-thumb">
                                <img loading="lazy" class="radius-6 w-100" src="{{ $caseStudy->image }}" alt="{{ $caseStudy->title }}">
                                </div>
                            </div>
                        </div>
                    @endif
                    
                    <div class="tp-case-studies-details-value-wrap">
                        {!! $caseStudy->content !!}
                    </div>
                </div>

                <div class="col-lg-4">
                    <x-partials::case-studies.sidebar :caseStudy="$caseStudy" />
                </div>
            </div>
        </div>
    </div>
    

    <div class="tp-cc-project-ptb tp-sec-ptb pt-130 pb-130" data-bg-color="#F7F7F5">
        <div class="container col-md-10 mx-auto">
        <div class="row align-items-end">
            <div class="col-lg-12">
                <div class="tp-cc-project-heading mb-60">
                    <span class="tp-section-sub tp-fade-anim">Related case studies</span>
                    <h3 class="tp-section-title corporate-color" data-text-split data-letters-fade-in>Cross-industry intelligence built to <br> solve the toughest challenges.</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="tp-cc-project-slider">
                    <div class="tp-cc-project-active swiper">
                    <div class="swiper-wrapper">
                        @forelse ($this->caseStudies as $caseStudyItem)
                            <div class="swiper-slide">
                                <x-case-studies.item :caseStudy="$caseStudyItem" />      
                            </div>
                        @empty
                            
                        @endforelse
                    </div>
                    <div class="tp-cc-project-dot"></div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>         

</main>