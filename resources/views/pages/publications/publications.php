<?php

use App\Models\Publication;
use App\Models\PublicationType;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;

new class extends Component {

    #[Url()]
    public $search = '';
    
    public PublicationType $publicationType;

    #[Computed]
    function publications() {
        return $this->publicationType->publications()
                    ->when($this->search, function($query, $keyword) {
                        $query->where('name', 'LIKE', "%{$keyword}%");
                    })
                    ->published()->paginate();
    }
};