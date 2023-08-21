@extends('layouts.dashboard')



@section('content')

<section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header pb-0 ">
                        <h4 class="card-title mb-0 ">Customer Details</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                        <div class=" mb-3 ">
                          <a href="{{ route('customer.index') }}" class=" btn btn-danger ">Back</a>
                        </div>
                        <div class="row mt-5">
                          <div class="col-4 ">
                            Name: <span class=" fw-bold">{{ $customer->name }}</span>
                          </div>
                          <div class="col-4 ">
                            Email: <span class=" fw-bold">{{ $customer->email }}</span>
                          </div>
                          <div class="col-4 ">
                            Phone Number: <span class=" fw-bold">{{ $customer->phone }}</span>
                          </div>
                          <div class="col-12 mt-4">
                            Address: <span class=" fw-bold">{{ $customer->address }}</span>
                          </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection