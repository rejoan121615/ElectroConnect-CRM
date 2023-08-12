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
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>In Stock</th>
                                <th>Brand</th>
                                <th>Dealer</th>
                                {{-- <th>Selling Status</th> --}}
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Apple MacBook Air 13.3-Inch Retina Display 8-core sdfsdfdf fsfsdf sfsdfs</td>
                                <td>5</td>
                                <td>Apple</td>
                                <td>Sobu Ahmed</td>
                                {{-- <td><span class="badge bg-success">Active</span></td> --}}
                                <td>
                                    <div class=" btn-group">
                                        <button class=" btn btn-primary">Details</button>
                                        <button class=" btn btn-success ">Edit</button>
                                        <button class=" btn btn-danger ">Delete</button>
                                    </div>
                                </td>
                            </tr>

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
@endsection
