@if(count($errors) > 0 )
    @foreach($errors->all() as $error)
        <br>
        <div class="col-md-12">
            <div class="alert alert-danger">
                {{$error}}
            </div>
        </div>
    @endforeach
@endif

@if(session('success'))
    <br>
    <div class="col-md-12">
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    </div>
@endif

@if(session('error'))
    <br>
    <div class="col-md-12">
        <div class="alert alert-danger">
            {{session('error')}}
        </div>
    </div>
@endif