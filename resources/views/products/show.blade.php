@extends('products.layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="float-left">Show product</div>
            <div class="float-right">
                <a href="{{ route('products.index') }}" class="btn btn-info"> Back</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    {{ $product->name }}
                </div>
                <div class="form-group">
                    <strong>Detail:</strong>
                    {{ $product->detail }}
                </div>
            </div>
        </div>
    </div>
@endsection
