@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #e0f2fe, #f8fafc);
        font-family: 'Poppins', sans-serif;
    }

    .add-menu-card {
        max-width: 750px;
        margin: 80px auto;
        background: #ffffff;
        border-radius: 25px;
        box-shadow: 0 12px 35px rgba(0, 0, 0, 0.12);
        animation: fadeInUp 0.7s ease-in-out;
        overflow: hidden;
    }

    .card-header {
        background: linear-gradient(90deg, #2563eb, #60a5fa);
        color: #fff;
        text-align: center;
        padding: 30px 0;
    }

    .card-header h2 {
        font-weight: 700;
        margin: 0;
    }

    .card-body {
        padding: 40px;
    }

    .form-label {
        font-weight: 600;
        color: #1e293b;
        margin-bottom: 6px;
    }

    .form-control, .form-select {
        border-radius: 15px;
        border: 1px solid #cbd5e1;
        padding: 10px 14px;
        font-size: 1rem;
        box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
    }

    .form-control:focus, .form-select:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 10px rgba(37, 99, 235, 0.25);
    }

    .btn-gradient {
        background: linear-gradient(90deg, #2563eb, #60a5fa);
        color: white;
        border: none;
        padding: 10px 30px;
        border-radius: 50px;
        font-weight: 600;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
    }

    .btn-gradient:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(59, 130, 246, 0.4);
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(40px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<div class="container">
    <div class="add-menu-card">
        <div class="card-header">
            <h2><i class="bi bi-plus-circle-dotted me-2"></i>Tambah Menu</h2>
        </div>

        <div class="card-body">
            <form action="{{ route('menus.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label"><i class="bi bi-tag-fill text-primary me-2"></i>Nama Menu</label>
                    <input type="text" name="name" class="form-control" placeholder="Masukkan nama menu..." required>
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="bi bi-file-text-fill text-success me-2"></i>Deskripsi</label>
                    <textarea name="description" class="form-control" placeholder="Deskripsikan menu..."></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="bi bi-cash-coin text-warning me-2"></i>Harga</label>
                    <input type="number" name="price" class="form-control" step="0.01" placeholder="Masukkan harga..." required>
                </div>

                <div class="mb-4">
                    <label class="form-label"><i class="bi bi-folder-fill text-info me-2"></i>Kategori</label>
                    <select name="category_id" class="form-select" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-gradient">
                        <i class="bi bi-save-fill me-1"></i> Simpan
                    </button>
                    <a href="{{ route('menus.index') }}" class="btn btn-outline-secondary rounded-pill ms-2 px-4">
                        <i class="bi bi-arrow-left-circle me-1"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
