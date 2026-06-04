<div class="accordion-items">
        <div class="accordion-header">
            <button class="accordion-buttons" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapse-{{ $loop->index }}" aria-expanded="true" aria-controls="collapse-{{ $loop->index }}">
                {{ $faq->question }}
                <span class="tp-faq-icon"></span>
            </button>
        </div>
        <div id="collapse-{{ $loop->index }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
            data-bs-parent="#{{ $id }}">
            <div class="accordion-body">
                <div class="mb-0! [&>*]:text-gray-600! leading-normal">
                    {!! $faq->answer !!}
                </div>
            </div>
        </div>
    </div>