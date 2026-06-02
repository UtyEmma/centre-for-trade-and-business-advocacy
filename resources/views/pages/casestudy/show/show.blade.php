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

    <div class="tp-case-studies-details-ptb tp-sec-ptb pt-135 pb-110">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="tp-case-studies-details-ii-wrap mb-50">
                    <div class="row">
                        <div class="col-xl-4">
                            <div class="tp-case-studies-details-ii-left mb-30">
                                <div class="tp-case-studies-details-ii-text mb-30 pl-20">
                                <p>{{$caseStudy->summary}}</p>
                                </div>
                                <div class="tp-case-studies-details-ii-item" data-bg-color="#CEF79E">
                                <h3><span class="purecounter" data-purecounter-duration="2" data-purecounter-end="90"></span>%</h3>
                                <p>Accelerated business growth by <br>
                                    150% in 18 months with our <br>
                                    precision-built strategy</p>
                                <div class="tp-case-studies-details-ii-dvdr"></div>
                                <h3><span class="purecounter" data-purecounter-duration="3" data-purecounter-end="180"></span>K</h3>
                                <p>Core data within Catalyst Zero’s IP.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8">
                        </div>
                        <div class="tp-case-studies-details-ii-right mb-30">
                            <div class="tp-case-studies-details-ii-thumb">
                            <img class="radius-6 w-100" src="{{ $caseStudy->image }}" alt="{{ $caseStudy->title }}">
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="tp-case-studies-details-value-wrap">
                    {!! $caseStudy->content !!}
                    </div>
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
                                <x-case-studies.slide :caseStudy="$caseStudyItem" />      
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