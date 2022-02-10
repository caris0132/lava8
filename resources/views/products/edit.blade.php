@extends('products.layout')

@section('content')
    <div class="col-12 clearfix">
        <div class="float-left">Edit product</div>
        <div class="float-right">
            <a href="{{ route('products.index') }}" class="btn btn-info">Back</a>
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
    <div class="col-12">
        <form action="{{ route('products.update', $product->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="detail">Detail</label>
                        <input type="text" name="detail" value="{{ $product->detail }}" id="detail" class="form-control" placeholder="detail"
                            aria-describedby="helpDetail">
                    </div>
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
