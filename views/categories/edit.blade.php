@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(to bottom right, #e3f2fd, #f8f9fa);
        font-family: 'Poppins', sans-serif;
    }

    .edit-container {
        max-width: 700px;
        margin: 60px auto;
        background: #ffffff;
        border-radius: 20px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        padding: 40px 50px;
        animation: fadeInUp 0.8s ease;
    }

    .edit-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .edit-header h1 {
        font-weight: 700;
        font-size: 2rem;
        color: #0d6efd;
        margin-bottom: 10px;
    }

    .edit-header p {
        color: #6c757d;
        font-size: 0.95rem;
    }

    label {
        font-weight: 600;
        color: #374151;
    }

    .form-control {
        border-radius: 12px;
        padding: 10px 14px;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 6px rgba(13, 110, 253, 0.4);
    }

    .btn-custom {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(to right, #0d6efd, #4e9eff);
        color: white;
        font-weight: 600;
        border: none;
        border-radius: 12px;
        padding: 10px 22px;
        transition: all 0.3s ease;
    }

    .btn-custom:hover {
        background: linear-gradient(to right, #0056b3, #0d6efd);
        transform: scale(1.05);
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<div class="edit-container">
    <div class="edit-header">
        <i class="bi bi-pencil-square fs-1 text-primary mb-3"></i>
        <h1>Edit Kategori</h1>
        <p>Perbarui data kategori sesuai kebutuhan</p>
    </div>

    <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name">Nama Kategori</label>
            <input type="text" id="name" name="name" class="form-control mt-1" 
                   value="{{ $category->name }}" required>
        </div>

        <div class="mb-4">
            <label for="description">Deskripsi</label>
            <textarea id="description" name="description" class="form-control mt-1" rows="4">{{ $category->description }}</textarea>
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary rounded-pill">
                <i class="bi bi-arrow-left-circle me-1"></i> Kembali
            </a>
            <button type="submit" class="btn btn-custom rounded-pill">
                <i class="bi bi-save me-2"></i> Update
            </button>
        </div>
    </form>
</div>
@endsection
