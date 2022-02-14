@extends('backend.master')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Sản phẩm</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Sản phẩm</li>
                        </ol>
                    </div>
                </div>

            </div>
        </section>
        <section class="content">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Quản lý sản phẩm</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row mb-2 col-md-12">
                        <a href="{{ route('backend.products.create') }}" class="btn btn-success">Thêm sản phẩm</a>
                        <!-- SidebarSearch Form -->
                        <div class="form-inline ml-3">
                            <form method="GET" action="{{ route('backend.products.index') }}" class="input-group" >
                                <input name="keywords" class="form-control form-control-sidebar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-search fa-fw"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">{{ $message }}</div>
                    @endif
                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Detail</th>
                            <th style="width: 240px">Action</th>
                        </tr>
                        @foreach ($products as $item)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <img src="{{ asset('/products/' . $item->image) }}" alt="{{ $item->name }}">
                                </td>
                                <td>{{ $item->detail }}</td>
                                <td>
                                    <form action="{{ route('backend.products.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')

                                        <a href="{{ route('backend.products.show', $item->id) }}"
                                            class="btn btn-info">Show</a>
                                        <a href="{{ route('backend.products.edit', $item->id) }}"
                                            class="btn btn-primary">Edit</a>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>

                <div class="card-footer">
                    {!! $products->links() !!}
                </div>
            </div>
        </section>
    </div>
    @foreach ($products as $item)
        {{ $item->name }}
    @endforeach
@endsection
