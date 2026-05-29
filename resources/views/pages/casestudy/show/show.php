<?php

use App\Models\CaseStudy;
use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component {
    

    public CaseStudy $caseStudy;

    #[Computed()]
    function caseStudies(){
        return CaseStudy::where('id', '!=', $this->caseStudy->id)->latest()->limit(5)->get();
    }
};