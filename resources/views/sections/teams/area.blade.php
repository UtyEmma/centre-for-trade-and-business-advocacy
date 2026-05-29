@props([
    'teamMembers' => collect()
])

<div class="tp-team-ptb tp-team-style pt-135 pb-110">
        <div class="container col-md-10 mx-auto">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tp-team-heading text-center mb-60">
                        <span class="tp-section-sub tp-fade-anim">Our team members</span>
                        <h2 class="tp-section-title" data-text-split data-letters-fade-in>Selecting the right
                            experienced financial <br> team for your prosperous future</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($teamMembers as $teamMember)
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <x-team.item 
                            :teamMember="$teamMember"
                        />
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </div>