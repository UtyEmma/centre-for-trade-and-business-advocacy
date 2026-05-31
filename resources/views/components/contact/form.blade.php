<?php

use Livewire\Component;

new class extends Component {
    
    public $name = '';
    public $email = '';
    public $phone = '';
    public $message = '';
    public $status = '';

    function submit() {

    }
};
?>

<div class="tp-contact-from mb-30 tp-fade-anim" data-delay=".5" data-fade-from="right">
    <form wire:submit="submit">
        <div class="row">
        <div class="col-12">
            <div class="tp-contact-input mb-15">
                <input placeholder="Your full name*" wire:model="name" type="text">
                <x-input.error key="name" class="mt-2" />
            </div>
            <div class="tp-contact-input mb-15">
                <input placeholder="Email address*" wire:model="email" type="email">
                <x-input.error key="email" class="mt-2" />
            </div>
            <div class="tp-contact-input mb-15">
                <input placeholder="Phone Number*" wire:model="phone" type="tel">
                <x-input.error key="phone" class="mt-2" />
            </div>
            <div class="tp-contact-input mb-15">
                <textarea placeholder="How can we help? Fell free to write here" wire:model="message"></textarea>
                <x-input.error key="message" class="mt-2" />
            </div>
            <div class="tp-contact-input-btn">
                <button class="tp-btn w-100" type="submit">Send your message</button>
                <p class="ajax-response mt-5">{{$status}}</p>
            </div>
        </div>
        </div>
    </form>
</div>