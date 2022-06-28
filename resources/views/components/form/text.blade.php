<div {{ $attributes }}>
    {!! Form::label($name, $label, ['class' => 'form-label']) !!}

    {!! Form::text($name, $defaultValue, [
        'class' => $errors->has($errorName) ? 'form-control is-invalid' : 'form-control',
    ]) !!}

    @error($errorName)
    <div class="invalid-feedback">
        {{ $errors->first($errorName) }}
    </div>
    @enderror
</div>
