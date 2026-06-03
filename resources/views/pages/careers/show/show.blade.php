<main>

    <x-partials::page.header
        title="{{ $jobPosting->title }}"
        :description="$jobPosting->summary"
        :breadcrumbs="[
            [ 'name' => 'Careers', 'url' => route('careers') ],
            [ 'name' => $jobPosting->title ],
        ]"
        image="{{ asset('assets/images/banners/careers-page-banner.png') }}"
    />


    <!-- career details area start -->
    <div class="tp-career-details-ptb pt-135 pb-110">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-12">
                    <div class="tp-career-details-heading tp-career-details-line text-center pb-95 mb-80">
                        <span class="tp-section-sub tp-fade-anim">Career</span>
                        <h3 class="tp-section-title mb-25" data-text-split data-letters-fade-in>{{$jobPosting->title}}</h3>
                        <p>{{$jobPosting->summary}}</p>
                    </div>

                    <div class="tp-career-details-item-wrapper pb-130">

                        <div class="tp-career-details-item tp-career-details-line pb-60 mb-70">
                            <h3 class="tp-career-details-title">About the role:</h3>

                            <ul class="flex flex-col gap-2 mb-4 list-none">
                                @if ($jobPosting->department)                                
                                    <li><strong>Department:</strong> {{$jobPosting->department}}</li>
                                @endif
                                @if ($jobPosting->location)                                
                                    <li><strong>Location:</strong> {{$jobPosting->location}}</li>
                                @endif
                                @if ($jobPosting->workspace_type)                                
                                    <li><strong>Workspace Type:</strong> {{$jobPosting->workspace_type}}</li>
                                @endif
                                @if ($jobPosting->employment_type)                                
                                    <li><strong>Employment Type:</strong> {{$jobPosting->employment_type}}</li>
                                @endif
                                @if ($jobPosting->salary_range)                                
                                    <li><strong>Salary Range:</strong> {{$jobPosting->salary_range}}</li>
                                @endif
                            </ul>

                            @if ($jobPosting->description)
                                <div>{!! $jobPosting->description !!}</div>
                            @endif
                        </div>
                        
                        @if ($jobPosting->responsibilities)
                            <div class="tp-career-details-item tp-career-details-line pb-60 mb-70">
                                <h3 class="tp-career-details-title">Responsibilities</h3>
                                
                                <div>{!! $jobPosting->responsibilities  !!}</div>
                            </div>
                        @endif
                        
                        @if ($jobPosting->requirements)
                            <div class="tp-career-details-item tp-career-details-line pb-60 mb-70">
                                <h3 class="tp-career-details-title">What we’re looking for:</h3>

                                <div>
                                    {!! $jobPosting->requirements !!}
                                </div>
                                {{-- <div class="tp-career-details-item-list">
                                    <ul>
                                        <li>8–10+ years of experience in DevOps, SRE, infrastructure, or platform
                                            engineering roles.</li>
                                        <li>Deep hands-on expertise with cloud platforms (GCP and/or AWS) and
                                            infrastructure-as-code (Terraform preferred).</li>
                                        <li>Strong experience building and maintaining CI/CD pipelines for modern
                                            application stacks.</li>
                                        <li>Proficiency in modern observability ecosystems (Datadog experience is a major
                                            plus).</li>
                                        <li>Solid understanding of cloud security, IAM, container security, and network
                                            architecture.</li>
                                        <li>Ability to lead technical initiatives across teams and influence engineering
                                            best practices.</li>
                                        <li>Comfortable being the first hire on a new team—capable of switching between
                                            architect, implementer, mentor, and operator roles.</li>
                                    </ul>
                                </div> --}}
                            </div>
                        @endif

                        @if ($jobPosting->benefits)
                            <div class="tp-career-details-item">
                                <h3 class="tp-career-details-title">Benefits:</h3>

                                <div>
                                    {!! $jobPosting->benefits !!}
                                </div>
                                {{-- <div class="tp-career-details-item-list">
                                    <ul>
                                        <li>Generous retirement, equity, healthcare, and PTO policies</li>
                                        <li>Flexibility to work remotely from anywhere in the United States</li>
                                        <li>ReflexAI is an equal opportunity employer. We are committed to equal employment
                                            opportunities regardless of race/ethnicity, color,</li>
                                        <li>ancestry, religion, sex, national origin, sexual orientation, age, citizenship,
                                            marital status, disability, gender, military status, neurodiversity, or any
                                            other federal, state or local protected class in the United States</li>
                                    </ul>
                                </div> --}}
                            </div>
                        @endif
                    </div>
                    
                    @if (filled($jobPosting->application_url))
                        <div class="tp-career-details-input-box radius-6" data-bg-color="#F7F7F5">
                            <div class="tp-career-details-input-top">
                                <h3 class="tp-section-title text-4xl mb-15">Apply for this role</h3>
                                <p>Continue to the application page to submit your details.</p>
                            </div>
                            <div class="tp-career-details-input-content">
                                <div class="tp-career-details-input">
                                    <a class="tp-btn theme-bg-color tp-btn-switch-animation" href="{{ $jobPosting->application_url }}" target="_blank" rel="noopener">
                                        <span class="d-flex align-items-center justify-content-center">
                                            <span class="btn-text">
                                                Apply for this Role
                                            </span>
                                            <i class="btn-icon"></i>
                                            <i class="btn-icon"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @elseif (filled($jobPosting->application_email))
                        <div class="tp-career-details-input-box radius-6" data-bg-color="#F7F7F5">
                            <div class="tp-career-details-input-top">
                                <h3 class="tp-section-title text-4xl mb-15">Apply for this role</h3>
                                <p>
                                    Please send your application to
                                    <a class="tp-line-anim " href="mailto:{{ $jobPosting->application_email }}">{{ $jobPosting->application_email }}</a>.
                                </p>
                            </div>
                        </div>
                    @else
                        <livewire:career.application-form :job-posting="$jobPosting" />
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- career details area start -->


    <!-- cta area start -->
    <div class="tp-fa-cta-ptb">
        <div class="tp-fa-cta-thumb">
            <img loading="lazy" src="{{ asset('assets/img/advisory/cta/thumb.jpg') }}" alt="">
        </div>
    </div>
    <!-- cta area end -->


</main>
