<main>

    <x-partials::page.header 
        title="{{ $teamMember->name }}"
        description="Meet the people and institutional leadership guiding our work in research, advocacy, policy engagement, and sustainable market reform."
        :breadcrumbs="[
            ['name' => 'Meet Our Team', 'url' => route('teams')],
            ['name' => $teamMember->name],
        ]" 
        image="{{ asset('assets/images/banners/teams-page-banner.png') }}"
    />  


    <!-- team details area start -->
    <div class="tp-team-details-ptb tp-sec-ptb pt-140 pb-110">
        <div class="container col-md-10 mx-auto">
            <div class="row gap-10">
                <div class="col-lg-4">
                    <div class="tp-team-details-thumb mb-30 tp-fade-anim" data-fade-from="left">
                        <img class="radius-6 aspect-3/4 object-cover" src="{{ $teamMember->image }}" alt="">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="tp-team-details-wrapper mb-30">
                        <div class="tp-team-details-heading">
                            <div>
                                <h3 class="tp-team-details-title" data-text-split data-letters-fade-in>{{ $teamMember->name }}</h3>
                                <p class="text-lg!">{{$teamMember->role}} - {{$teamMember->category->name}}</p>
                            </div>

                            <div class="text-gray-600!">
                                {!! $teamMember->bio !!}
                            </div>
                        </div>
                        <div class="tp-team-details-content">
                            {{-- <div class="tp-team-details-contact">
                                <span>Phone: <a href="tel:+12345678910">+1 234 567 8910</a></span>
                            </div>
                            <div class="tp-team-details-contact">
                                <span>Office: <a href="tel:+12345678910">+1 234 567 8910</a></span>
                            </div> --}}
                            @if ($teamMember->phone)
                                <div class="tp-team-details-contact">
                                    <span>Phone: <a href="tel:{{ $teamMember->phone }}">{{ $teamMember->phone }}</a></span>
                                </div>
                            @endif
                            @if ($teamMember->email)
                                <div class="tp-team-details-contact">
                                    <span>Email: <a href="mailto:{{ $teamMember->email }}">{{ $teamMember->email }}</a></span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>