@extends('products.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="float-left">Add new product</div>
            <div class="float-right">
                <a href="{{ route('products.index') }}" class="btn btn-info">Back</a>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops! </strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('products.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="">Name:</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter name...">
                </div>
                <div class="form-group">
                    <label for="">Detail:</label>
                    <textarea name="detail" rows="10" class="form-control"></textarea>
                </div>
                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </div>
    </form>
@endsection
