@extends('layouts.dashboard', ['pageTitle' => 'Create Product'])


@section('content')
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header pb-0 ">
                        <h4 class="card-title mb-0 ">Update your product data</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                        <div class=" mb-3 ">
                          <a href="{{ route('product.index') }}" class=" btn btn-danger ">Back</a>
                        </div>
                            <form class="form" method="post" action="{{ route('product.update', $product->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row gy-2">
                                    <div class="col-md-12 col-12">
                                        <x-forms.input name="name" label="Product Name" placeholder="What's your name"
                                            value="{{ $product->name }}" />
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <x-forms.textarea name="description" label="Description "
                                            value="{{ $product->description }}" />
                                    </div>
                                    <div class="col-md-4">
                                        <x-forms.select name="category_id" label="Select Category " :options="json_encode(['1' => 'Red', '2' => 'Green'])"
                                            value="{{ $product->category_id }}" />
                                    </div>
                                    <div class="col-md-4">
                                        <x-forms.select name="brand_id" label="Select Brand" :options="json_encode(['1' => 'Red', '2' => 'Green'])"
                                            value="{{ $product->brand_id }}" />
                                    </div>
                                    <div class="col-md-4">
                                        <x-forms.select name="supplier_id" label="Select Supplier" :options="json_encode(['1' => 'Red', '2' => 'Green'])"
                                            value="{{ $product->supplier_id }}" />

                                    </div>
                                    <div class="col-md-4">
                                        <x-forms.select name="supplier_product_id" label="Select Supplier" :options="json_encode(['1' => 'Red', '2' => 'Green'])"
                                            value="{{ $product->supplier_product_id }}" />

                                    </div>
                                    <div class="col-md-4">
                                        <x-forms.input name="stock_quantity" label="Stock Quantity"
                                            value="{{ $product->stock_quantity }}" />

                                    </div>
                                    <div class="col-md-4">
                                        <x-forms.input name="price" label="Price (tk)" value="{{ $product->price }}" />

                                    </div>
                                    <div class="col-md-4">
                                        <x-forms.input name="cost_price" label="Cost Per Piece (tk)"
                                            value="{{ $product->cost_price }}" />

                                    </div>
                                    <div class="col-md-4">
                                        <x-forms.input name="weight" label="Weight (kg)" value="{{ $product->weight }}" />

                                    </div>
                                    <div class="col-md-4">
                                        <x-forms.input name="dimension" label="Dimentions (Feet)"
                                            value="{{ $product->dimension }}" />

                                    </div>
                                    <div class="col-md-6">
                                        <x-forms.input type="file" name="image_url" label="Product Image"
                                            error="Image upload fail (make sure it's JPG/PNG/JPEG) and smaller then 4Mb"
                                            value="{{ $product->image_url }}" />
                                            <div class=" w-50 ">
                                              <img class=" w-100" src="{{ $product->image_url }}" alt="Product Image">
                                            </div>
                                    </div>
                                    <div class="col-md-6">
                                        <x-forms.input name="tags" label="Write Your Tags"
                                            value="{{ $product->tags }}" />
                                    </div>

                                    <div class="col-12 d-flex justify-content-start mt-5 ">
                                        <button type="submit" class="btn btn-primary me-4 mb-1">
                                            Update Product
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
