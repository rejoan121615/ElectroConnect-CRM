@extends('layouts.dashboard')



@section('content')

<section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header pb-0 ">
                        <h4 class="card-title mb-0 ">Supplier Details</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                        <div class=" mb-3 ">
                          <a href="{{ route('supplier.index') }}" class=" btn btn-danger ">Back</a>
                        </div>
                        <div class="row mt-5">
                          <div class="col-4 ">
                            Name: <span class=" fw-bold">{{ $supplier->name }}</span>
                          </div>
                          <div class="col-4 ">
                            Email: <span class=" fw-bold">{{ $supplier->email }}</span>
                          </div>
                          <div class="col-4 ">
                            Phone Number: <span class=" fw-bold">{{ $supplier->phone }}</span>
                          </div>
                          <div class="col-12 mt-4">
                            Address: <span class=" fw-bold">{{ $supplier->address }}</span>
                          </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection