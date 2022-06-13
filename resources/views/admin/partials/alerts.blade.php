    @if (session()->has('success'))
    <div class="my-2 alert alert-success" role="alert">
        {{ session()->get('success') }}
    </div>
    @endif

    @if (session()->has('warning'))
    <div class="my-2 alert alert-warning" role="alert">
        {{ session()->get('warning') }}
    </div>
    @endif

    @if (session()->has('danger'))
    <div class="my-2 alert alert-danger" role="alert">
        {{ session()->get('danger') }}
    </div>
    @endif

    @if (session()->has('errors'))
    <div class="my-2 alert alert-danger" role="alert">
        Please chack the form for errors and try again.
    </div>
    @endif

    @if (session()->has('info'))
    <div class="my-2 alert alert-info" role="alert">
        {{ session()->get('info') }}
    </div>
    @endif
