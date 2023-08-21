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
           @foreach ($customers as $customer )
               <tr>
                <td>{{ $customer->id }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->phone }}</td>
                <td>
                    <div class=" btn-group">
                        <a href="{{ route('customer.show', $customer->id)}}" class=" btn btn-primary">View</a>
                        <a href="{{ route('customer.edit', $customer->id )}}" class=" btn btn-secondary ">Edit</a>
                        <form action="{{ route('customer.destroy', $customer->id)}}" method="POST">
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