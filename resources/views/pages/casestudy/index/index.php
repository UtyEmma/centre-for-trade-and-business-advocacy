<?php

use App\Models\CaseStudy;
use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component {
    
    #[Computed()]
    function caseStudies(){
        return CaseStudy::latest()->paginate();
    }

};