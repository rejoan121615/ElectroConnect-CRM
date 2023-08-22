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
                        <h4 class="card-title mb-0 ">Add new product</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="POST" action="{{ route('product.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row gy-2">
                                    <div class="col-md-12 col-12">
                                        <x-forms.input name="name" label="Product Name" placeholder="What's your name" />
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <x-forms.textarea name="description" label="Description " />
                                    </div>
                                    <div class="col-md-4">
                                        <label for="category" class="form-label">Select Category</label>
                                        <select class=" form-select " name="category_id" id="category">
                                            {{-- <option value="{{ old('category_id')}}">{{  }}</option> --}}
                                            @foreach ($categories as $category )
                                                <option value="{{ $category->id }}" {{ old('category_id') ? 'selected' : ''}}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <p class=" text-danger ">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="brand" class="form-label">Select Brand</label>
                                        <select class=" form-select " name="brand_id" id="brand">
                                            @foreach ($brands as $brand )
                                                <option value="{{ $brand->id }}" {{ old('brand_id') ? 'selected' : ''}}>{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('brand_id')
                                            <p class=" text-danger ">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="supplier" class="form-label">Select Supplier</label>
                                        <select class=" form-select " name="supplier_id" id="supplier">
                                            <option value="">Select your supplier</option>
                                            @foreach ($suppliers as $supplier )
                                                <option value="{{ $supplier->id }}" {{ old('supplier_id') ? 'selected' : ''}}>{{ $supplier->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('supplier_id')
                                            <p class=" text-danger ">{{ $message }}</p>
                                        @enderror
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
                                    <div class="col-md-4">
                                        <x-forms.input type="file" name="image_url" label="Product Image"
                                            error="Image upload fail (make sure it's JPG/PNG/JPEG) and smaller then 4Mb" />                                    </div>
                                    <div class="col-md-12">
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


@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function () {
        $("select").select2({
            placeholder: 'Select Your option'
        });
    });
</script>
@endsection
