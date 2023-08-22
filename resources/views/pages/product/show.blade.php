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
            <img class=" w-100 " src={{ asset('storage/'.$product->image) }} alt="Product Image">
          </div>
          <div class="col-6">
            <h3>Product Details</h3>
            <p class=" fs-40">Name: {{ $product->name }} </p>
            <p>Brand: {{ $product->brand->name}}</p>
            <p>Category: {{ $product->category->name}}</p>
            <p>Overall cost / Costing price: {{ $product->cost_price}}</p>
            <p>Price / Selling Price: {{ $product->price}}</p>
            <p>Stock: {{ $product->stock }}</p>
            <p class=" me-5 "> Listed : {{ $product->created_at->diffforhumans()}}</p>
            <p> Dymention: {{ $product->updated_at}} </p>
          </div>
        </div>
      </div>
      
    </div>
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-6 mt-3 ">
            <h3>Supplier Details</h3>
            <p>Name: {{ $product->supplier->name }} </p>
            <p>Email: {{ $product->supplier->email }}</p>
            <p>Phone: {{ $product->supplier->phone }}</p>
            <p>Phone: {{ $product->supplier->address }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



@endsection