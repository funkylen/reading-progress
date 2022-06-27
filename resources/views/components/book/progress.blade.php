<div class="progress">
    <div class="progress-bar" role="progressbar"
         style="width: {{ $percent }}%"
         aria-valuenow="{{ $value }}"
         aria-valuemin="0"
         aria-valuemax="{{ $max }}"
    >
        {!! $content !!}
    </div>
</div>
