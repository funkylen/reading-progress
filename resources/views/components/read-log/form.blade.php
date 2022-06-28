<div class="card">
    <div class="card-header">{{ $label }}</div>

    <div class="card-body">
        {!! Form::open($formOptions) !!}

        @if($readLog['pages_count'])
            <x-form.number
                name="read_log[pages_count]"
                :default-value="$readLog->pages_count"
                label="{{ __('read_log.pages_count') }}"
                class="mb-3"/>
        @else
            <x-form.number
                name="current_page"
                label="{{ __('read_log.current_page') }}"
                class="mb-3"/>
        @endif

        <x-form.date name="read_log[date]" :default-value="$readLog->date" label="{{ __('read_log.date') }}"/>

        <x-form.button title="{{ $buttonLabel }}"/>

        {!! Form::close() !!}
    </div>
</div>
