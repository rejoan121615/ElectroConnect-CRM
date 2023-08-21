@extends('layouts.dashboard')



@section('content')

<section>
  <div class="container">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-12 mb-3 ">
            <a href=" {{ route('product.index')}} " class=" btn btn-danger">Back</a>
          </div>
          <div class="col-6">
            <img class=" w-100 " src={{ $product->image_url}} alt="Product Image">
          </div>
          <div class="col-6">
            <p class=" fs-40">{{ $product->name }} </p>
            <p>Brand: {{ $product->brand_id}}</p>
            <p>Category: {{ $product->category_id}}</p>
            <p>Overall cost / Costing price: {{ $product->cost_price}}</p>
            <p>Price / Selling Price: {{ $product->price}}</p>
            <p>Stock: {{ $product->stock_quantity}}</p>
            <p>Supplier Id: {{ $product->supplier_id}}</p>
            <p>Supplier Product Id: {{ $product->supplier_product_id }}</p>
            <div class=" btn {{ $product->availability ? "btn-success" : "btn-danger" }}">{{ $product->availability ? "Available" : "Not Available"}}</div>
          </div>
          <div class="col-12">
            <h5>Product Description:</h5>
            <p>{{ $product->description ?? "Not Available"}}</p>
          </div>
          <div class="col-12">
            <h5>Product Spacification:</h5>
            <p>{{ $product->specifications ?? "Not Available"}}</p>
          </div>
          <div class="col-12">
            <p> Weight: {{ $product->weight ?? "Not Available"}}</p>
            <p> Dymention: {{ $product->dimensions ?? "Not Available"}} </p>
          </div>
          {{-- format date  --}}
          @php
            
          @endphp

          <div class="col-12 d-flex ">
            <p class=" me-5 "> Listed : {{ $product->created_at->diffforhumans()}}</p>
            <p> Dymention: {{ $product->updated_at}} </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



@endsection