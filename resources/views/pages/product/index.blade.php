@extends('layouts.dashboard')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/table-datatable-jquery.css') }}">
@endsection


@section('content')
    <!-- Basic Tables start -->
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class=" w-100 d-grid mb-4 ">
                     <a class=" btn btn-success " href="{{ route("product.create")}}">Add new product</a>
                    </div>
                <div class="table-responsive">
                    <table class="table" id="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Brand</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th class=" no-sort " style=" width: 0">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($products as $product )
                               <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->brand_id }}</td>
                                <td>{{ $product->stock_quantity }}</td>
                                <td>{{ $product->price }}</td>
                                <td>
                                    <div class=" btn-group">
                                        <a href="{{ route('product.show', $product->id) }}" class=" btn btn-primary">View</a>
                                        <a href="{{ route('product.edit', $product->id )}}" class=" btn btn-secondary ">Edit</a>
                                        <form action="{{ route('product.destroy', $product->id)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class=" btn btn-danger">Delete</button>
                                        </form>
                                        {{-- <a href="" class=" btn btn-danger ">Delete</a> --}}
                                    </div>
                                </td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- Basic Tables end -->
@endsection

@section('scripts')
    <script src="{{ asset('assets/extensions/jquery.min.js') }}"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
    <script src="{{ asset('assets/extensions/datatables.js') }}"></script>
    <script src="{{ asset('assets/custom/script.js') }}"></script>
@endsection
