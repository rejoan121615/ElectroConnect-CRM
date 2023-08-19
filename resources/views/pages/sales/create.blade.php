@extends('layouts.dashboard', ['pageTitle' => 'Create Product'])


@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header pb-0 ">
                        <h4 class="card-title mb-0 ">Create New Sale</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" id="sale-form" method="POST" action="{{ route('sales.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row gy-2">
                                    <div class=" col-12 mb-2 ">
                                        <h5>Customer Info:</h5>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <label for="name">Customer Name</label>
                                        <select name="name" id="customer-name"
                                            class="form-select @error('name') is-invalid @enderror ">
                                            <option value="">Write your name here </option>
                                            @if (old('name'))
                                                <option id="old_name" value="1" selected></option>
                                            @endif
                                        </select>
                                        @error('name')
                                            <p class=" invalid-feedback pb-0 ">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label class=" form-label" for="email">Email Address: </label>
                                        <input class="form-control @error('email') is-invalid @enderror" type="email" id="email" name="email" value="{{ old('email') }}">
                                        @error('email')
                                            <p class=" invalid-feedback pb-0 ">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label class=" form-label" for="phone">Phone Number: </label>
                                        <input class="form-control @error('phone') is-invalid @enderror" type="text" id="phone" name="phone" value=" {{ old('phone') }}">
                                        @error('phone')
                                            <p class=" invalid-feedback pb-0 ">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                    <div class=" col-12">
                                        <label class=" form-label" for="address">Address: </label>
                                        <input class="form-control @error('address') is-invalid @enderror" type="text" id="address" name="address" value="{{ old('address')}}">
                                        @error('address')
                                            <p class=" invalid-feedback pb-0 ">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                    <div class=" col-12 " id="payment_method">
                                        <label for="payment_method_select" class=" form-label">Payment Method</label>
                                        <select name="payment_method" class=" form-select @error('payment_method') is-invalid @enderror " id="payment_method_select">
                                            <option value="">Select a paytment method</option>
                                            <option value="1" {{ old('payment_method') == 1 ? 'selected' : ''}}>Cash</option>
                                            <option value="2" {{ old('payment_method') == 2 ? 'selected' : ''}}>Bkash</option>
                                        </select>
                                        @error('payment_method')
                                            <p class=" invalid-feedback pb-0 ">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                    <div class="col-9 d-none " id="trx_id">
                                        <label for="trx_id_input" class="form-label">Trx Id / Transection Id (Bkash)</label>
                                        <input type="text" class="form-control @error('trx_id') is-invalid @enderror  " name="trx_id" id="trx_id_input">
                                        @error('trx_id')
                                            <p class=" invalid-feedback pb-0 ">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                    <div class=" col-12">
                                        <label for="comment" class="form-label">Comments</label>
                                        <textarea name="comment" id="" cols="30" rows="10" class=" w-100 form-control @error('comment') is-invalid @enderror   "></textarea>
                                        @error('comment')
                                            <p class=" invalid-feedback pb-0 ">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                    <div class=" col-12 mt-4 mb-2 ">
                                        <h5>Product Details:</h5>
                                    </div>
                                    <div class="col-12 ">
                                        <div class="row">
                                            <div class="col-10">
                                                <label for="product">Product Name</label>
                                                <select id="product" class=" form-select ">
                                                    <option value="">Type your product name</option>
                                                </select>
                                            </div>
                                            <div class="col-1">
                                                <label for="quantity" class=" form-label">Quantity</label>
                                                <input type="number" class=" form-control" placeholder="Ex. 5"
                                                    id="quantity" value="1">
                                            </div>
                                            <div class="col-1">
                                                <button disabled id="add-product" class=" btn icon btn-primary mt-30 ">
                                                    <i class="bi bi-plus-circle-fill"></i>
                                                </button>
                                            </div>
                                        </div>
                                        @error('total_amount')
                                            <p class=" text-danger">Please select atleast one product</p>
                                        @enderror
                                    </div>
                                    <div class=" col-12 mt-4 mb-2 ">
                                        <h6>Product List:</h6>
                                    </div>
                                    <div class="col-12 ">
                                        <table class="table" id="product-table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Item Name</th>
                                                    <th scope="col">Quantity</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td></td>
                                                    <td>Sub Total:</td>
                                                    <td>$0.00</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>Tax %:</td>
                                                    <td>$0.00</td>
                                                    <td></td>
                                                </tr>
                                                <tr class=" bg-light-secondary ">
                                                    <td></td>
                                                    <td>
                                                        <h6 class=" text-primary mb-0 ">Total:</h6>
                                                    </td>
                                                    <td id="total-price" class=" text-primary fw-bold ">$0.00</td>
                                                    <td><input id="total_amount" type="hidden" name="total_amount"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">
                                            Submit
                                        </button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                            Reset
                                        </button>
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

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('assets/custom/script.js') }}"></script>
@endsection
