<?php

use App\Enums\JobPostingStatus;
use App\Models\JobPosting;
use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component {
    
    #[Computed()]
    function jobs(){
        return JobPosting::open()->get();
    }
};