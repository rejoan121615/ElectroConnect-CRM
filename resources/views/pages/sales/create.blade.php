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
                                        <label for="name">Product Name</label>
                                        <select name="name" id="customer-name" class=" form-select ">
                                            <option value="">Write your name here </option>
                                            {{-- @foreach ($customers as $customer)
                                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                            @endforeach --}}
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        {{-- <x-forms.input name="email" type="email" label="Email:" value="me@rejoan.com"
                                            placeholder="Email address?" /> --}}
                                        <label class=" form-label" for="email">Email Address: </label>
                                        <input class="form-control" type="email" id="email" name="email">
                                    </div>
                                    <div class="col-6">
                                        <label class=" form-label" for="email">Phone Number: </label>
                                        <input class="form-control" type="text" id="phone" name="phone">
                                        {{-- <x-forms.input name="phone" label="Phone Number:" placeholder="Phone number?" /> --}}
                                    </div>
                                    <div class=" col-12">
                                        <label class=" form-label" for="address">Address: </label>
                                        <input class="form-control" type="text" id="address" name="address">
                                    </div>
                                    {{-- <div class="col-md-12 col-12">
                                        <div class="row">
                                            <div class="col-6">
                                                <x-forms.input name="address" label="Street 1:" placeholder="Street 1" />
                                            </div>
                                            <div class="col-6">
                                                <x-forms.input name="address" label="Street 2:" placeholder="Street 2" />
                                            </div>
                                            <div class="col-4">
                                                <x-forms.input name="address" label="City Name:" placeholder="City name" />
                                            </div>
                                            <div class="col-4">
                                                <x-forms.input name="address" label="State/Region:"
                                                    placeholder="State/Region name" />
                                            </div>
                                            <div class="col-4">
                                                <x-forms.input name="address" label="Postal Code:"
                                                    placeholder="Postal Code" />
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class=" col-12 mt-4 mb-2 ">
                                        <h5>Product Details:</h5>
                                    </div>
                                    <div class="col-12 ">
                                        <div class="row">
                                            <div class="col-9">
                                                <x-forms.input name="product" label="Search Product"
                                                    placeholder="Type your product name" />
                                            </div>
                                            <div class="col-2">
                                                <x-forms.input name="product" label="Quantity" placeholder="Ex: 5" />
                                            </div>
                                            <div class="col-1">
                                                <button id="add-new-product" class=" btn icon btn-primary mt-30 ">
                                                    <i class="bi bi-plus-circle-fill"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" col-12 mt-4 mb-2 ">
                                        <h6>Product List:</h6>
                                    </div>
                                    <div class="col-12 ">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Item Name</th>
                                                    <th scope="col">Quantity</th>
                                                    <th scope="col">Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Dell vostro 5720 I5/8GB/256GB SSD/ 2Gb Nvidia</td>
                                                    <td>3</td>
                                                    <td>85,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Asus Vivobook X515KA Celeron N4500 15.6" FHD Laptop</td>
                                                    <td>2</td>
                                                    <td>65,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Acer Extensa 15 EX215-54-37AH Core i3 11th Gen 15.6" FHD Laptop</td>
                                                    <td>3</td>
                                                    <td>85,000</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>Sub Total:</td>
                                                    <td>$0.00</td>
                                                </tr>
                                                <tr>
                                                    <td></td>

                                                    <td>Tax %:</td>
                                                    <td>$0.00</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>Fees/discounts:</td>
                                                    <td>$0.00</td>
                                                </tr>
                                                <tr class=" bg-light-secondary ">
                                                    <td></td>
                                                    <td>
                                                        <h6 class=" text-primary mb-0 ">Total:</h6>
                                                    </td>
                                                    <td class=" text-primary fw-bold ">4,87,000</td>
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
