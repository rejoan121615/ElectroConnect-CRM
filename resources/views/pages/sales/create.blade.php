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
                                        <select name="name" id="customer-name" class="form-select " required>
                                            <option value="">Write your name here </option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label class=" form-label" for="email">Email Address: </label>
                                        <input class="form-control" type="email" id="email" name="email" required>
                                    </div>
                                    <div class="col-6">
                                        <label class=" form-label" for="email">Phone Number: </label>
                                        <input class="form-control" type="text" id="phone" name="phone" required>
                                    </div>
                                    <div class=" col-12">
                                        <label class=" form-label" for="address">Address: </label>
                                        <input class="form-control" type="text" id="address" name="address" required>
                                    </div>
                                    <div class=" col-3 ">
                                        <label for="trx_id" class=" form-label">Trx Id / Transection Id (Bkash)</label>
                                        <select name="payment_method" id="" class=" form-select">
                                            <option value="1">Cash</option>
                                            <option value="1">Bkash</option>
                                        </select>
                                    </div>
                                    <div class="col-9">
                                        <label for="trx_id" class="form-label">Trx Id / Transection Id (Bkash)</label>
                                        <input type="text" class="form-control " name="trx_id" >
                                    </div>
                                    <div class=" col-12">
                                        <label for="comment" class="form-label">Comments</label>
                                        <textarea name="comment" id="" cols="30" rows="10" class=" w-100 form-control " ></textarea>
                                    </div>
                                    <div class=" col-12 mt-4 mb-2 ">
                                        <h5>Product Details:</h5>
                                    </div>
                                    <div class="col-12 ">
                                        <div class="row">
                                            <div class="col-10">
                                                <label for="product">Product Name</label>
                                                <select id="product" class=" form-select " required>
                                                    <option value="">Type your product name</option>
                                                </select>
                                            </div>
                                            <div class="col-1">
                                                <label for="quantity" class=" form-label">Quantity</label>
                                                <input type="number" class=" form-control" placeholder="Ex. 5"
                                                    id="quantity" value="1" required>
                                            </div>
                                            <div class="col-1">
                                                <button disabled id="add-product" class=" btn icon btn-primary mt-30 ">
                                                    <i class="bi bi-plus-circle-fill"></i>
                                                </button>
                                            </div>
                                        </div>
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
                                                    <td></td>
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
