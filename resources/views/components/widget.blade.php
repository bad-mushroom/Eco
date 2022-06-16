<div class="card border border-5 border-{{ $type ?? 'primary' }} border-top-0 border-end-0 border-bottom-0 h-100 py-2">
    <div class="card-body">
        <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-{{ $type ?? 'primary' }} text-uppercase mb-1">{{ $label }}</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $value }}</div>
            </div>
            <div class="col-auto">
                <i class="{{ $icon }} fa-2x text-grey"></i>
            </div>
        </div>
    </div>
</div>
