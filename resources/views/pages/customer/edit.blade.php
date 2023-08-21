@extends('layouts.dashboard', ['pageTitle' => 'Create Product'])


@section('content')
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header pb-0 ">
                        <h4 class="card-title mb-0 ">Update Customer</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                        <div class=" mb-3 ">
                          <a href="{{ route('customer.index') }}" class=" btn btn-danger ">Back</a>
                        </div>
                            <form class="form" method="post" action="{{ route('customer.update', $customer->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row gy-2">
                                    <div class="col-6">
                                        <x-forms.input name="name" label="customer Name" placeholder="What is the name of customer?"
                                            value="{{ $customer->name }}" />
                                    </div>
                                    <div class="col-6">
                                        <x-forms.input name="email" type="email" label="Email Address "
                                            value="{{ $customer->email }}" />
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <x-forms.input name="phone" type="text" label="Phone Number "
                                            value="{{ $customer->phone }}" />
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <x-forms.input name="address" type="text" label="Address "
                                            value="{{ $customer->address }}" />
                                    </div>
                                    <div class=" mt-3 ">
                                        <button type="submit" class=" btn btn-success w-100 ">Update customer</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
