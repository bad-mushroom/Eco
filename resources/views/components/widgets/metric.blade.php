@props([
    'icon'  => 'bi bi-person',
    'color' => 'primary',
    'label' => '',
    'value' => 0,
])

<div class="card border border-{{ $color }} border-3 border-bottom-0 border-end-0 border-top-0 shadow-sm h-100 py-2">
    <div class="card-body">
        <div class="row no-gutters align-items-center">
            <div class="col me-2">
                <div class="fs-5 fw-bold text-{{ $color }} text-uppercase mb-1">{{ $label }}</div>
                <div class="h5 mb-0 fw-bold text-muted">{{ $value }}</div>
            </div>
            <div class="col-auto">
                <i class="{{ $icon }} fs-1 text-muted"></i>
            </div>
        </div>
    </div>
</div>
