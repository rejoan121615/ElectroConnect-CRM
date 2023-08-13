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
                <div class="table-responsive">
                    <table class="table" id="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Brand</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th class=" no-sort " style=" width: 0">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($products as $product )
                               <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->brand_id }}</td>
                                <td>{{ $product->stock_quantity }}</td>
                                <td>{{ $product->price }}</td>
                                <td>
                                    <div class=" btn-group">
                                        <a href="{{ route('product.show', $product->id) }}" class=" btn btn-primary">View</a>
                                        <a href="" class=" btn btn-secondary ">Edit</a>
                                        <a href="" class=" btn btn-danger ">Delete</a>
                                    </div>
                                </td>
                            </tr>
                           @endforeach
                            {{-- <tr>
                                <td>OPPO A17 Smartphone (4/64GB)</td>
                                <td>OPPO</td>
                                <td>14</td>
                                <td>18,000</td>
                                <td>
                                    <div class=" btn-group">
                                        <a href="" class=" btn btn-primary">View</a>
                                        <a href="" class=" btn btn-secondary ">Edit</a>
                                        <a href="" class=" btn btn-danger ">Delete</a>
                                    </div>
                                </td>
                            </tr> --}}
                            {{-- <tr>
                                <td>Redmi Note 7</td>
                                <td>OPPO</td>
                                <td>14</td>
                                <td>18,000</td>
                                <td>
                                    <div class=" btn-group">
                                        <a href="" class=" btn btn-primary">View</a>
                                        <a href="" class=" btn btn-secondary ">Edit</a>
                                        <a href="" class=" btn btn-danger ">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Iphone 11 pro plus</td>
                                <td>OPPO</td>
                                <td>14</td>
                                <td>18,000</td>
                                <td>
                                    <div class=" btn-group">
                                        <a href="" class=" btn btn-primary">View</a>
                                        <a href="" class=" btn btn-secondary ">Edit</a>
                                        <a href="" class=" btn btn-danger ">Delete</a>
                                    </div>
                                </td>
                            </tr> --}}
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
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                columnDefs: [{
                        targets: 'no-sort',
                        orderable: false
                    }, 
                    // { targets: 3, width: '100px' },
                ]

            });
        });
    </script>
@endsection
