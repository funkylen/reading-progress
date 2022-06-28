<div {{ $attributes }}>
    {!! Form::label($name, $label, ['class' => 'form-label']) !!}
    {!! Form::number($name, $defaultValue, ['class' => 'form-control', 'placeholder' => $placeholder]) !!}
</div>
