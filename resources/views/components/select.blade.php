<div class="form-group">
  <label>{{ $label }}</label>
  <select class="form-control {{ $class }}" name="{{ $name }}" id="{{ $id }}" {{ $required }}>
    {{ $slot }}
  </select>
</div>