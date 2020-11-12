@extends('layouts\app')
@section('content')
<div class="row" style="margin-left:10px">
    <div class="col-lg-10 margin-tb">
        <div class="pull-left">
            <h2> Show Licensee</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('licensees.index') }}"> Back</a>
        </div>
    </div>
</div>
<div class="row" style="margin-left:10px">
    <div class="col-xs-10 col-sm-10 col-md-10">
        <div class="form-group">
            <strong>Username:</strong>
            {{ $licensee->username }}
        </div>
    </div>
    <div class="col-xs-10 col-sm-10 col-md-10">
        <div class="form-group">
            <strong>Email:</strong>
            {{ $licensee->email }}
        </div>
    </div>
    <div class="col-xs-10 col-sm-10 col-md-10">
        <div class="form-group">
            <strong>Password:</strong>
            {{ $licensee->password }}
        </div>
    </div>

    <div class="col-xs-10 col-sm-10 col-md-10">
        <div class="form-group">
            <strong>Products:</strong>
            <ul>
                @foreach ($licensee->products as $product)
                <li>{{$product->descriptif_name}}</li>
                @endforeach
            </ul>

        </div>
    </div>
</div>
@endsection