<?php

use App\Models\CaseStudy;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;

new class extends Component {


    #[Url]
    public $search = '';

    #[Computed]
    function caseStudies(){
        return CaseStudy::where('title', 'LIKE', "%{$this->search}%")->latest()->paginate();
    }

};