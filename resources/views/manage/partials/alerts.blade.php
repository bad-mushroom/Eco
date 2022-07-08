@if(session()->has('success'))
<div class="my-3 alert alert-success" role="my-3 alert">
    {{ session()->get('success') }}
</div>
@elseif(session()->has('error'))
<div class="my-3 alert alert-danger" role="my-3 alert">
    {{ session()->get('error') }}
</div>
@elseif(session()->has('warning'))
<div class="my-3 alert alert-warning" role="my-3 alert">
    {{ session()->get('warning') }}
</div>
@elseif(session()->has('info'))
<div class="my-3 alert alert-info" role="my-3 alert">
    {{ session()->get('info') }}
</div>
@endif

