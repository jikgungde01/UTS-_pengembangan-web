@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #f8f9fa, #e3f2fd);
        font-family: 'Poppins', sans-serif;
    }

    .edit-container {
        max-width: 700px;
        margin: 60px auto;
        background: #ffffff;
        border-radius: 20px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        padding: 40px;
        transition: all 0.3s ease-in-out;
    }

    .edit-container:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 28px rgba(0, 0, 0, 0.15);
    }

    .edit-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .edit-header h1 {
        font-weight: 700;
        color: #0d6efd;
    }

    .form-label {
        font-weight: 600;
        color: #495057;
    }

    .form-control, .form-select {
        border-radius: 10px;
        border: 1px solid #ced4da;
        transition: all 0.2s ease;
    }

    .form-control:focus, .form-select:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.2rem rgba(13,110,253,0.25);
    }

    .btn-primary {
        background: linear-gradient(90deg, #0d6efd, #0b5ed7);
        border: none;
        border-radius: 10px;
        padding: 10px 20px;
        transition: 0.3s;
        font-weight: 600;
    }

    .btn-primary:hover {
        background: linear-gradient(90deg, #0b5ed7, #0a58ca);
        transform: scale(1.03);
    }

    .btn-secondary {
        border-radius: 10px;
        font-weight: 600;
    }
</style>

<div class="edit-container">
    <div class="edit-header">
        <h1><i class="bi bi-pencil-square me-2"></i>Edit Menu</h1>
        <p class="text-muted">Perbarui data menu yang sudah ada dengan informasi terbaru.</p>
    </div>

    <form action="{{ route('menus.update', $menu) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama Menu</label>
            <input type="text" name="name" class="form-control" value="{{ $menu->name }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="description" class="form-control" rows="3">{{ $menu->description }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Harga</label>
            <input type="number" name="price" class="form-control" step="0.01" value="{{ $menu->price }}" required>
        </div>

        <div class="mb-4">
            <label class="form-label">Kategori</label>
            <select name="category_id" class="form-select" required>
                @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $menu->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('menus.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left-circle me-1"></i> Kembali
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-check-circle me-1"></i> Update
            </button>
        </div>
    </form>
</div>
@endsection
