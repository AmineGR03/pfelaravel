@extends('admin.home')

@section('products')
    <div class="container" style="border: 2px solid #000033; padding: 20px; margin-top: 20px;">
        <h1 class="mt-5">All Products</h1>
        <table class="table mt-4" border="1">
            <thead style="background-color: #000033; color: white;">
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($menus as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->categorie }}</td>
                    <td>${{ $product->price }}</td>
                    <td>
                        <a href="{{ route('admin.edit', $product->id) }}" class="btn btn-primary">Modify</a>
                        <form action="{{ route('admin.destroy', $product->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
