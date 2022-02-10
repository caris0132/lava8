@extends('products.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Laravel 8 CRUD Example from scratch - ItSolutionStuff.com</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <div>{{ $message }}</div>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th style="width: 280px">action</th>
        </tr>
        @foreach ($products as $item)
            <tr>
                <td>{{++$i}}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->detail }}</td>
                <td>
                    <form action="{{ route('products.destroy', $item->id) }}" method="post">
                        <a href="{{ route('products.show', $item->id) }}" class="btn btn-info">Show</a>
                        <a href="{{ route('products.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {!! $products->links() !!}
@endsection
