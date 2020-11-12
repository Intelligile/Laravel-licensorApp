@extends('layouts\app')

@section('content')
<div class="row" style="margin-left:10px">
    <div class="col-lg-10 margin-tb">
        <div class="pull-left">
            <h2>Products Management</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{route('products.create')}}"> Create New Product</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<div class="col-xs-10 col-sm-10 col-md-10">
    <table class="table table-bordered" style="margin-left:10px">
        <tr>
            <th>Product Key</th>
            <th>Descriptif Name</th>
            <th>Description</th>
            <th width="280px">Price</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{$product->product_key}}</td>
            <td>{{ $product->descriptif_name }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->price}}</td>

            <td>
                <form action="{{route('products.destroy',$product->id)}}" method="POST">

                    <a class="btn btn-info" href="{{route('products.show',$product->id)}}">Show</a>

                    <a class="btn btn-primary" href="{{route('products.edit',$product->id)}}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
{{ $products->links() }}

@endsection