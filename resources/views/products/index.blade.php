@extends('layouts.dash')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 style="margin-left:15px;">CRUD </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create')}}" title="Create a product"> <i class="fas fa-plus-circle">Create a product</i>
                    </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg" style="margin-left:15px;">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Date Created</th>
            <th>Date Updated</th>
            <th>Actions</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->created_at }}</td>
                <td>{{ $product->updated_at }}</td>
                <td>
                    <form action="{{route('products.destroy', $product->id)}}" method="POST">

                        <a href="{{route('products.show', $product->id)}}" title="show">
                            <i class="btn btn-success">show</i>
                        </a>

                        <a href="{{route('products.edit', $product->id)}}">
                            <i class="btn btn-info">edit</i>
                        </a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="btn btn-danger">delete</i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $products->links() !!}

@endsection