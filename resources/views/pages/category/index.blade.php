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
                <form action="{{ $route }}" method="POST">
                    @csrf
                    @if (isset($formType))
                      @method($formType)
                    @endif
                    <div class="row">
                        <div class="col-3">
                            <x-forms.input label="Catagory Name" name="name" value="{{ isset($formValue) ? $formValue->name : ''  }}" />
                        </div>
                        <div class="col-7">
                            <x-forms.input label="Short Description (max: 100)" name="description" value="{{ isset($formValue) ? $formValue->description : ''  }}" />
                        </div>
                        <div class="col-2 ">
                            <button type="submit" class=" btn btn-primary mt-30 w-100 ">Create Category</button>
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
                                <th>Id</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th class=" no-sort " style=" width: 0">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td class=" btn-group">
                                        <a href="{{ route('category.edit', $category->id ) }}" class=" btn btn-primary ">Edit</a>
                                        <form action="{{ route('category.destroy', $category->id )}}" method="POST">
                                          @csrf
                                          @method('delete')
                                          <button type="submit" class=" btn btn-danger ">Delete</button>
                                        </form>
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
