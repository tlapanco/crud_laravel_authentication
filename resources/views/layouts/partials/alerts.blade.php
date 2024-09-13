<!-- Alerts -->
<div class="alert-container">
    @if(session('message'))
    <div class="alert alert-message m-0 text-center fw-bold fs-6 w-100 my-2">{{session("message")}}</div>
    @endif
    
    @if(session('error'))
    <div class="alert alert-error m-0 text-center fw-bold fs-6 w-100 my-2">{{session("error")}}</div>
    @endif
</div>
<!-- Alerts End -->
