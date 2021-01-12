<div class="{{ $class }}">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{ $title }}</h4>
            <div class="float-right">
                {{ $floatRight }}
            </div>
        </div>
        <div class="card-content">
            <div class="card-body">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>