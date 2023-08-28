@extends('layouts.dashboard')


@section('content')

<div>
    <div class="row">
        @foreach ($meetings as $meeting )
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    <h6>{{ $meeting->title }}</h6>
                </div>
                <div class="card-body">
                    <p>{{ $meeting->description }}</p>
                    <div class="row">
                        <div class="col-12">
                            <p>Supplier Name : <strong>{{ $meeting->supplier->name }}</strong></p>
                        </div>
                        <div class="col-6">
                            <p>Date : <strong>{{ $meeting->date }}</strong></p>
                        </div>
                        <div class="col-6">
                            <p>Time : <strong>{{ date('g:i A', strtotime($meeting->time))  }}</strong></p>
                        </div>
                    </div>
                    <div class="col-12">
                        <form action="{{ route('meeting.destroy', $meeting->id)}}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class=" btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection



