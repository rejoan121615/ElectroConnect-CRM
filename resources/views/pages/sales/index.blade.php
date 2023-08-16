@extends('layouts.dashboard')

@section('css')
  <link rel="stylesheet" href="{{ asset('assets/compiled/css/dataTables.bootstrap5.min.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/compiled/css/table-datatable-jquery.css')}}">
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
                                <th>Id</th>
                                <th>Customer Name</th>
                                <th>Total Product</th>
                                <th >Total Amount</th>
                                <th>Profit</th>
                                <th class=" no-sort " style=" width: 0">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Mohd Rejoan</td>
                                <td>8</td>
                                <td>58,485 Tk</td>
                                <td>7,580 Tk</td>
                                <td class=" btn-group" class=" w-0 ">
                                    <a href="" class=" btn btn-primary ">View</a>
                                    <a href="" class=" btn btn-info ">Edit</a>
                                    <a href="" class=" btn btn-danger ">Delete</a>
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
    <script src="{{ asset('assets/custom/script.js') }}"></script>
@endsection
