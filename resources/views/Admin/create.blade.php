@extends('admin.home')

@section('creation')
    <div class="container mt-5">
        <h1>Create Product</h1>
        <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="categorie">Category:</label>
                <input type="text" class="form-control" id="categorie" name="categorie" required>
            </div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="info">Info:</label>
                <textarea class="form-control" id="info" name="info" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="pic">Picture:</label>
                <input type="file" class="form-control-file" id="pic" name="pic" accept="image/*" required>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" class="form-control" id="price" name="price" min="0.01" step="0.01" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
