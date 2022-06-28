<div class="card">
    <div class="card-header">{{ $label }}</div>

    <div class="card-body">
        {!! Form::open($formOptions) !!}

        <x-form.text name="book[title]" label="{{ __('book.title') }}" :default-value="$book['title']" class="mb-3"/>

        <x-form.text name="book[author]" label="{{ __('book.author') }}" :default-value="$book['author']" class="mb-3"/>

        <x-form.number name="book[pages_count]" label="{{ __('book.pages_count') }}" :default-value="$book['pages_count']"
                       class="mb-3"/>

        <x-form.number name="book[start_page]" label="{{ __('book.start_page') }}" :default-value="$book['start_page'] ?? 0"
                       :hidden="isset($book['start_page'])" class="mb-3"/>

        <x-form.button title="{{ $buttonLabel }}"/>

        {!! Form::close() !!}
    </div>
</div>
