@props([
'icon' => 'bi bi-person',
'color' => 'primary',
'label' => '',
'value' => 0,
])

<div class="card border border-{{ $color }} border-3 border-bottom-0 border-end-0 border-top-0 shadow-sm h-100 py-2">
    <div class="card-body">
        <div class="row no-gutters align-items-center">
            <div class="col me-2">
                <div class="fs-5 fw-bold text-{{ $color }} text-uppercase mb-1">{{ $label }}</div>
                <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                        <div class="h5 mb-0 me-3 text-muted">{{ $value }}%</div>
                    </div>
                    <div class="col">
                        <div class="progress progress-sm me-2">
                            <div class="progress-bar bg-{{ $color }}" role="progressbar" style="width: {{ $value }}%" aria-valuenow="50"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
