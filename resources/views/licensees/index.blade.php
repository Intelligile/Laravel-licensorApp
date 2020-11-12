@extends('layouts\app')

@section('content')
<div class="row" style="margin-left:10px">
    <div class="col-lg-10 margin-tb">
        <div class="pull-left">
            <h2>Licensee Management</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{route('licensees.create')}}"> Create New Licensee</a>
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
        <th>Username</th>
        <th>Email</th>
        <th width="280px">Licensee's products</th>
    </tr>
    @foreach ($licensees as $licensee)
    <tr>
        <td>{{$licensee->username}}</td>
        <td>{{ $licensee->email }}</td>
        <td>
            <ul>
                @foreach ($licensee->products as $product)
                <li>{{$product->descriptif_name}}</li>
                @endforeach
            </ul>


        </td>

        <td>
            <form action="{{route('licensees.destroy',$licensee->id)}}" method="POST">

                <a class="btn btn-info" href="{{route('licensees.show',$licensee->id)}}">Show</a>

                <a class="btn btn-primary" href="{{route('licensees.edit',$licensee->id)}}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
</div>
{{-- {{ $products->links() }} --}}

@endsection