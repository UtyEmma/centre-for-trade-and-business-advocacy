<?php

use App\Models\Event;
use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component {
    
    #[Computed()]
    function events() {
        return Event::latest('start_at')->paginate();
    }
};