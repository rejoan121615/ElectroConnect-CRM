@extends('layouts.dashboard')



@section('content')
<div class="card mt-4 ">
  <div class="card-body">
    <form action="" method="POST">
        @csrf
        <div class="row">
          <div class="col-12">
            <x-forms.input label="Task Title" value="{{ old('title')}}" name="title"  />
          </div>
          <div class="col-12">
            <x-forms.textarea label="Task Title" value="{{ old('title')}}" name="title"  />
          </div>
          <div class=" col-12 mt-4 mb-2 ">
            <button type="submit" class=" btn btn-primary w-100 ">Submit</button>
          </div>
        </div>
      </form>
  </div>
</div>

@endsection