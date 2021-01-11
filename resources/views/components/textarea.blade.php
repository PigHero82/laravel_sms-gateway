<div class="form-group">
    <label>{{ $label }}</label>
    <textarea class="form-control {{ $class }}" name="{{ $name }}" id="{{ $id }}" cols="30" rows="{{ $rows }}" placeholder="{{ $placeholder }}" {{ $required }}>{{ $slot }}</textarea>
</div>