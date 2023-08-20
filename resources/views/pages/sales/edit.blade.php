@extends('layouts.dashboard', ['pageTitle' => 'Create Product'])


@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <section>
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header pb-0 ">
                        <h4 class="card-title mb-0 ">Create New Sale</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" id="sale-edit-form" method="POST" action="{{ route('sales.update', $sale->id ) }}">
                                @csrf
                                @method('put')
                                <div class="row gy-2">
                                    <div class=" col-12 mb-2 ">
                                        <h5>Customer Info:</h5>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <label class=" form-label" for="name">Customer Name:</label>
                                        <input type="text" value="{{ $sale->customer->name }}" name="name" class=" form-control " disabled>
                                    </div>
                                    <div class="col-6">
                                        <label class=" form-label" for="email">Email Address:</label>
                                        <input type="text" value="{{ $sale->customer->email }}" name="email" class=" form-control " disabled>
                                    </div>
                                    <div class="col-6">
                                        <label class=" form-label" for="phone">Phone Number:</label>
                                        <input type="text" value="{{ $sale->customer->phone }}" name="phone" class=" form-control " disabled>
                                       
                                    </div>
                                    <div class=" col-12">
                                        <label for="address">Address:</label>
                                        <input type="text" value="{{ $sale->customer->address }}" name="address" class=" form-control " disabled>
                                    </div>
                                    <div class=" col-12">
                                        <x-forms.textarea name="comment" value="{{ $sale->comment }}" label="Comments" />
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
                                                    @foreach ($products as $product )
                                                      <option value="{{ $product->id }}">{{ $product->name }}</option>
                                                    @endforeach
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
                                                @foreach ($sale->sale_details()->get() as $details)
                                                    <tr data-product="{{ $details->id }}">
                                                        <td>{{ $details->products->name }}</td>
                                                        <td class="quantity">{{ $details->quantity }}</td>
                                                        <td class="price">{{ $details->price }}</td>
                                                        <td style="width: 0px;"><button
                                                                class="btn btn-danger remove-product">Remove</button></td>
                                                        <input type="hidden" name="products[]"
                                                            value="{{ $details->id }}|{{ $details->quantity }}" />
                                                    </tr>
                                                @endforeach
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
                                                    <td id="total-price" class=" text-primary fw-bold ">{{ $sale->paid_amount }}</td>
                                                    <td><input id="total_amount" type="hidden" name="total_amount" value="{{ $sale->paid_amount }}"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">
                                            Submit
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
