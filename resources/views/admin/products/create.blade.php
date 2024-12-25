@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Add New Product</h2>
    
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input type="number" name="price" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select name="category" class="form-control" required>
                        <option value="food">Food</option>
                        <option value="beverage">Beverage</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Image Source</label>
                    <select class="form-control" id="imageSourceSelect">
                        <option value="file">Upload File</option>
                        <option value="url">Image URL</option>
                    </select>
                </div>

                <div class="mb-3" id="fileUpload">
                    <label class="form-label">Upload Image</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="mb-3" id="urlInput" style="display: none;">
                    <label class="form-label">Image URL</label>
                    <input type="url" name="image_url" class="form-control" placeholder="https://example.com/image.jpg">
                </div>

                <button type="submit" class="btn btn-primary">Create Product</button>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>

<script>
document.getElementById('imageSourceSelect').addEventListener('change', function() {
    const fileUpload = document.getElementById('fileUpload');
    const urlInput = document.getElementById('urlInput');
    
    if (this.value === 'file') {
        fileUpload.style.display = 'block';
        urlInput.style.display = 'none';
        urlInput.querySelector('input').value = '';
    } else {
        fileUpload.style.display = 'none';
        urlInput.style.display = 'block';
        fileUpload.querySelector('input').value = '';
    }
});
</script>
@endsection