@extends('layouts.dashboard', ['pageTitle' => 'Create Product'])


@section('content')
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header pb-0 ">
                        <h4 class="card-title mb-0 ">Add new product</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row gy-2">
                                    <div class="col-md-12 col-12">
                                        <x-forms.input name="name" label="Product Name" placeholder="What's your name" />
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <x-forms.textarea name="description" label="Description " />
                                    </div>
                                    <div class="col-md-4">
                                        <x-forms.select name="category_id" label="Select Category " :options="json_encode(['1' => 'Red', '2' => 'Green'])" />
                                    </div>
                                    <div class="col-md-4">
                                        <x-forms.select name="brand_id" label="Select Brand" :options="json_encode(['1' => 'Red', '2' => 'Green'])" />
                                    </div>
                                    <div class="col-md-4">
                                        <x-forms.select name="supplier_id" label="Select Supplier" :options="json_encode(['1' => 'Red', '2' => 'Green'])" />

                                    </div>
                                    <div class="col-md-4">
                                        <x-forms.select name="supplier_product_id" label="Select Supplier"
                                            :options="json_encode(['1' => 'Red', '2' => 'Green'])" />

                                    </div>
                                    <div class="col-md-4">
                                        <x-forms.input name="stock_quantity" label="Stock Quantity" />

                                    </div>
                                    <div class="col-md-4">
                                        <x-forms.input name="price" label="Price (tk)" />

                                    </div>
                                    <div class="col-md-4">
                                        <x-forms.input name="cost_price" label="Cost Per Piece (tk)" />

                                    </div>
                                    <div class="col-md-4">
                                        <x-forms.input name="weight" label="Weight (kg)" />

                                    </div>
                                    <div class="col-md-4">
                                        <x-forms.input name="dimension" label="Dimentions (Feet)" />

                                    </div>
                                    <div class="col-md-6">
                                        <x-forms.input type="file" name="image_url" label="Product Image" error="Image upload fail (make sure it's JPG/PNG/JPEG) and smaller then 4Mb" />
                                        {{-- <input type="file" name="images[]" id="images" class="form-control" multiple> --}}
                                    </div>
                                    <div class="col-md-6">
                                        <x-forms.input name="tags" label="Write Your Tags" />
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
