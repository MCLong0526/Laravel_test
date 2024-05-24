@extends('layouts.app')

@section('content')
<div class="container mt-5 card">
    <div class="d-flex justify-content-between col-12 mt-3">
        <h1>{{ isset($product) ? 'Edit Product' : 'Add New Product' }}</h1>
        <a href="{{ route('products.index') }}" class="btn btn-primary mb-3"
            style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"
        >
        Back</a>
    </div>

    <div class="card-body">
        <form action="{{ isset($product) ? route('products.update', $product) : route('products.store') }}" method="POST">
            @csrf
            @if(isset($product))
                @method('PUT')
            @endif
            <div class="form-group mb-3">
                <label for="name"><strong>Name:</strong></label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ isset($product) ? $product->name : old('name') }}" placeholder="Name">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="price"><strong>Price (RM):</strong></label>
                <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ isset($product) ? $product->price : old('price') }}" placeholder="99.90">
                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="details"><strong>Detail:</strong></label>
                <textarea name="details" class="form-control @error('details') is-invalid @enderror" placeholder="Detail">{{ isset($product) ? $product->details : old('details') }}</textarea>
                @error('details')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="publish"><strong>Publish:</strong></label>
                <div>
                    <div>
                        <input type="radio" name="publish" value="1" {{ isset($product) && $product->publish ? 'checked' : '' }}> Yes
                    </div>
                    <div>
                        <input type="radio" name="publish" value="0" {{ isset($product) && !$product->publish ? 'checked' : '' }}> No
                    </div>
                </div>
            </div>

            <div class="d-grid gap-2 col-2 mx-auto">
                <button class="btn btn-primary mx-auto" type="submit">{{ isset($product) ? 'Update' : 'Submit' }}</button>
            </div>
        </form>
    </div>
</div>


@endsection
