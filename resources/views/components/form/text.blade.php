<div {{ $attributes }}>
    {!! Form::label($name, $label, ['class' => 'form-label']) !!}
    {!! Form::text($name, $defaultValue, ['class' => 'form-control']) !!}
</div>
