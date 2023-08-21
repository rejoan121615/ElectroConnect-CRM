@extends('layouts.dashboard')



@section('content')


  <div class="card">
    <div class="card-body">
      <table class="table" id="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th class=" no-sort " style=" width: 0">Actions</th>
            </tr>
        </thead>
        <tbody>
           @foreach ($suppliers as $supplier )
               <tr>
                <td>{{ $supplier->id }}</td>
                <td>{{ $supplier->name }}</td>
                <td>{{ $supplier->email }}</td>
                <td>{{ $supplier->phone }}</td>
                <td>
                    <div class=" btn-group">
                        {{-- <a href="{{ route('supplier.show', $supplier->id)}}" class=" btn btn-primary">View</a> --}}
                        <a href="{{ route('supplier.edit', $supplier->id )}}" class=" btn btn-secondary ">Edit</a>
                        <form action="{{ route('supplier.destroy', $supplier->id)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button class=" btn btn-danger">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
           @endforeach
        </tbody>
      </table>
    </div>
  </div>

@endsection