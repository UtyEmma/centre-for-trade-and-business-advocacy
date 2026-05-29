<?php

use App\Models\Service;
use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component {

    #[Computed]
    function services(){
        return Service::published()->latest()->paginate();
    }

    function mount() {

    }
};