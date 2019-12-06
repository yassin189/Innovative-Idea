

@if(session('success'))

<div class="row">
    <div class="col-md-8 col-md-offset-2">

    <div class="alert alert-success">
        {{session('success')}}
    </div>
    </div>
@endif

@if(session('error'))
<div class="col-md-8 col-md-offset-2">
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
    </div>
@endif

   
</div>