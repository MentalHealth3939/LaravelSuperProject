@extends('layouts.app')

@section('content')
<body>
    <h1>Create a product</h1>
    <form 
     method="POST" 
     action="{{ route('products.update', ['product' => $product->id ]) }}"
     enctype="multipart/form-data"
     >
        @csrf
        @method('PUT')
        <div class='fowm-row'>
            <label for="">Title</label>
            <input type="text" name='title'  class="form-control" value="{{ old('title') ?? $product->title }}" required>
        </div>
        <div class='fowm-row'>
            <label for="">Description</label>
            <input type="text" name='description'  class="form-control" value="{{ old('description') ?? $product->description }}" required>
        </div>
        <div class='fowm-row'>
            <label for="">Price</label>
            <input type="number" min='1.00' name='price'  class="form-control" value="{{ old('price') ??  $product->price }}" required>
        </div>
        <div class='fowm-row'>
            <label for="">Stock</label>
            <input type="number" min='0' name='stock'  class="form-control" value="{{ old('stock') ??  $product->stock }}" required>
        </div>
        <div class='form-row'>
            <label for="">Description</label>
            <select class="custom-select"  name='status' id="" required>
            <option {{ old('status')  == 'available' ? 'selected' : ($product->status == 'available' ? 'selected' : '') }} value="available"   >Available </option>
            <option {{  old('status') == 'unavailable' ? 'selected' : ($product->status == 'unavailable' ? 'selected' : '') }}  value="unavailable"   > Unavailable </option>
            </select>
        </div>

        <div class="form-row">
                            <label>
                                {{ __('Images') }}
                            </label> 
                                <div class="custom-file">
                                    <input type="file" accept="image/*" name="images[]"
                                    class="custom-file-input" multiple>
                                    <label class="custom-file-label">
                                    Product Images...
                                    </label>
                                </div>
                        </div>

        <div class="form-row mt-3">
            <button type="submit" class="btn btn-primary btn-lg">Edit Product</button>
        </div>
    </form>
@endsection