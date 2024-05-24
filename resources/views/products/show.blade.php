
@extends('layouts.app')

@section('content')
<div class="container mt-5 card">
    <div class="d-flex justify-content-between col-12 mt-3">
        <h1>Show Product</h1>
        <a href="{{ route('products.index') }}" class="btn btn-primary mb-3"
            style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"
        >
        Back</a>
    </div>
    <div class="card-body">
        <p class="card-text"><strong>Name</strong>: {{ $product->name }}</p>
        <p class="card-text"><strong>Price:</strong> RM {{ number_format($product->price, 2) }}</p>
        <p class="card-text"><strong>Details:</strong> {{ $product->details }}</p>
        <p class="card-text"><strong>Publish:</strong> {{ $product->publish ? 'Yes' : 'No' }}</p>

    </div>

</div>


@endsection
