@extends('layouts\app')
@section('content')
<div class="row">
    <div class="col-lg-10 margin-tb"  style="margin-left:10px">
        <div class="pull-left">
            <h2>Add New Licensee</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('licensees.index') }}"> Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="{{ route('licensees.store') }}" method="POST">
    @csrf

    <div class="row" style="margin-left:20px">
        <div class="col-xs-10 col-sm-10 col-md-10">
            <div class="form-group">
                <strong>Username:</strong>
                <input type="text" name="username" class="form-control" placeholder="Username">
            </div>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="email" name="email" class="form-control" placeholder="Email">
            </div>
        </div>

        <div class="col-xs-10 col-sm-10 col-md-10">
            <div class="form-group">
                <strong>Password:</strong>
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
        </div>
        
        @foreach($products as $product)
        <div class="col-xs-10 col-sm-10 col-md-10">
            <div class="form-group">
                <input type="checkbox" name="products[]" value="{{$product->id}}">
                <label>{{ $product->descriptif_name }}</label>
            </div>
        </div>
        @endforeach

        <div class="col-xs-10 col-sm-10 col-md-10 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>












@endsection