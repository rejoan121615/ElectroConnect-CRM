@extends('layouts.dashboard')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="card mt-4 ">
        <div class="card-body">
            <form action="{{ route('meeting.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <x-forms.input label="Meeting Title" name="title" placeholder="Your meeting title" />
                    </div>
                    <div class="col-12">
                        <x-forms.textarea label="Short Description (max: 300)" name="description" />
                    </div>
                    <div class=" col-4">
                        {{-- <x-forms.select label="Client" placeholder="Select your Client" name="client" /> --}}
                        <label for="client" class=" form-label">Supplier</label>
                        <select name="supplier_id" id="client" class="form-control">
                            <option value=""></option>
                            @foreach ($suppliers as $supplier)
                                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                            @endforeach
                        </select>
                        @error('client')
                            <p class=" text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="col-4">
                        <label for="date" class=" form-label">Pick a date</label>
                        <input type="date" class=" form-control" name="date">
                        @error('date')
                            <p class=" text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="col-4">
                        <label for="time" class=" form-label">Pick the time</label>
                        <input type="time" class=" form-control" name="time">
                        @error('time')
                            <p class=" text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="col-12 mt-4 ">
                        <button type="submit" class=" btn btn-primary">Create Meeting</button>
                        <button type="reset" class=" btn btn-outline-dark ">Reset Details</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection


@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $("#client").select2({
            tags: false,
            placeholder: "Write your client name",
            style: null,
        });
    </script>
@endsection
