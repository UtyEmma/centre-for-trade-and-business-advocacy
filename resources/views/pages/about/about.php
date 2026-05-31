<?php

use App\Models\TeamMember;
use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component {
    
    #[Computed()]
    function teamMembers() {
        return TeamMember::limit(4)->get();
    }
};