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
                                <th>Name</th>
                                <th>Total Quantity</th>
                                <th>Total Amount</th>
                                <th class="no-sort sorting_disabled" style="width: 200px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sales as $sale)
                                <tr>
                                <td>{{ $sale->id }}</td>
                                <td>{{ $sale->customer->name }}</td>
                                <td>{{ $sale->sale_details->sum('quantity') }}</td>
                                <td>{{ $sale->paid_amount }} Tk</td>
                                <td>
                                    {{-- <button class=" btn btn-primary ">Print</button> --}}
                                    <a href="{{ route('invoice.show', $sale->id) }}" class=" btn btn-primary ">View</a>
                                    <a href="{{ route('invoice.download', $sale->id) }}" class=" btn btn-success ">Download <i class="bi bi-download ms-2 "></i></a>
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
@endsection
