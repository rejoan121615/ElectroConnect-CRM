@extends('layouts.dashboard')



@section('content')

<div class="card mb-3">
  <div class="card-body">
    <div class="row">
      <form action="{{ route('task.store')}}" method="POST">
        @csrf
        <div class="row">
          <div class="col-12">
            <label class="form-label" for="description">Task Description</label>
            <textarea class=" form-control " name="description" id="description" cols="20" rows="3">{{ old('description') }}</textarea>
            @error('description')
              <p class=" text-danger mt-2 mb-0 ">{{ $message }}</p>
            @enderror
          </div>
          <div class=" col-12 mb-2 mt-3 ">
            <button type="submit" class=" btn btn-primary w-100 ">Create Task</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="card">
  <div class="card-body">
    <div class="row justify-content-between ">
      <div style="width: 49%;">
        <div class="row">
            @foreach ($incomplete as $task )
            <div class="col-12 border rounded-2 py-2 mb-2 position-relative ">
              {{-- <button class=" btn btn-danger"><i class="bi bi-trash3"></i></button> --}}
              <div class="row">
                <div class="col-12 mb-2">
                  <p class=" mb-0 ">{{ $task->description }}</p>
                </div>
                <div class="col-12 w-100 ">
                  <form action="{{ route('task.update', $task->id)}}" method="POST">
                    @csrf
                    @method('put')
                    <button type="submit" class=" btn btn-success w-100 ">Mark as complete</button>
                  </form>
                </div>
              </div>
            </div> 
            @endforeach
          <div class="col-12">
            {{-- {{ $incomplete->links()}} --}}
          </div>
        </div>
      </div>
      <div style="width: 49%;">
        <div class="row">
            @foreach ($complete as $task )
            <div class="col-12 border rounded-2 py-2 mb-2 position-relative ">
              {{-- <button class=" btn btn-sm btn-danger position-absolute top-0 end-0  "><i class="bi bi-trash3"></i></button> --}}
              <div class="row">
                <div class="col-12 mb-2">
                  <p class=" mb-0 ">{{ $task->description }}</p>
                </div>
                <div class="col-12 w-100 ">
                  <button class=" btn btn-danger w-100 " disabled>Task Completed Successfully</button>
                </div>
              </div>
            </div> 
            @endforeach
          <div class="col-12">
            {{-- {{ $complete->links()}} --}}
          </div>
        </div>
      </div>
    </div>
   
  </div>
</div>

@endsection