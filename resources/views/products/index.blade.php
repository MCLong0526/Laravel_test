@extends('layouts.app')

@section('content')
<div class="container mt-5 card">
    <div class="row mt-3">
        <div class="col-12">
            <div class="d-flex justify-content-between col-12">
                <h1>Laravel</h1>
                <a href="{{ route('products.create') }}" class="btn btn-success mb-3">
                    Create New Product
                </a>
            </div>
            <div class="d-flex justify-content-end mb-3">
                <form action="{{ route('products.index') }}" method="GET" class="d-flex">
                    <input type="text" name="search" closable class="form-control me-2" placeholder="Search (Name / Details)" value="{{ request('search') }}">
                    <button type="submit" class="btn btn-secondary ml-1">Search</button>
                </form>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Price (RM)</th>
                        <th>Details</th>
                        <th>Publish</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($products->count() !== 0)
                        @foreach($products as $index => $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->details }}</td>
                                <td>{{ $product->publish ? 'Yes' : 'No' }}</td>
                                <td>
                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-info" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                                        Show
                                    </a>
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                                        Edit
                                    </a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirmDelete(this);">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" class="text-center">No products found.</td>
                        </tr>
                    @endif
                </tbody>

            </table>
        </div>
    </div>
</div>

<!--Just use alert to confirm delete action, if user click yes, then delete the product-->
<script>
    function confirmDelete(form) {
    if (confirm("Are you sure you want to delete this product?")) {
        return true; // Submit the form
    } else {
        return false; // Prevent form submission
    }
}
</script>
@endsection
