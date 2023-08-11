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
          <form action="">
            <div class="row">
              <div class="col-3">
                <x-forms.input label="Brand Name" name="name" />
              </div>
              <div class="col-7">
                <x-forms.input label="Short Description (max: 100)" name="description" />
              </div>
              <div class="col-2 ">
                <button type="button" class=" btn btn-primary mt-30 w-100 ">Add New Brand</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      {{-- data table list  --}}
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>Brand Name</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Graiden</td>
                                <td>vehicula.aliquet@semconsequat.co.uk</td>
                                <td class=" btn-group">
                                  <form action="">
                                    <button type="button" class=" btn btn-secondary ">Edit</button>
                                  </form>
                                  <button class=" btn btn-danger ">Delete</button>
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
