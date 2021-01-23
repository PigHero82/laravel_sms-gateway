<div class="{{ $class }}">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{{ $title }}}</h4>
            <div class="float-right">
                {{ $floatRight }}
            </div>
        </div>
        <div class="card-content">
            <div class="card-body card-dashboard">
                <p class="card-text">{{ $description }}</p>
                <div class="table-responsive">
                    <table class="table table-striped" id="{{ $id }}">
                        {{ $slot }}
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>