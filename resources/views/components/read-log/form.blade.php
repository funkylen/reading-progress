<div class="card">
    <div class="card-header">{{ $label }}</div>

    <div class="card-body">
        {!! Form::open($formOptions) !!}

        <x-form.number name="read_log[pages_count]" :default-value="$readLog->pages_count" label="{{ __('Pages Count') }}" class="mb-3" />

        <x-form.date name="read_log[date]" :default-value="$readLog->date" label="{{ __('Date') }}"/>

        <x-form.button title="{{ $buttonLabel }}"/>

        {!! Form::close() !!}
    </div>
</div>
