@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #e3f2fd, #ffffff);
        font-family: 'Poppins', sans-serif;
    }

    .add-category-card {
        max-width: 700px;
        margin: 80px auto;
        background: #fff;
        border: none;
        border-radius: 20px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
        animation: fadeIn 0.7s ease-in-out;
    }

    .card-header {
        background: linear-gradient(90deg, #007bff, #00b4d8);
        color: #fff;
        border-radius: 20px 20px 0 0;
        text-align: center;
        padding: 25px 0;
    }

    .card-header h3 {
        font-weight: 700;
        margin: 0;
    }

    label {
        font-weight: 600;
        color: #333;
    }

    .form-control {
        border-radius: 10px;
        border: 1px solid #ced4da;
        padding: 10px 15px;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #00b4d8;
        box-shadow: 0 0 8px rgba(0, 180, 216, 0.4);
    }

    .btn-submit {
        background: linear-gradient(90deg, #007bff, #00b4d8);
        border: none;
        color: white;
        font-weight: 600;
        border-radius: 50px;
        padding: 10px 25px;
        transition: 0.3s ease;
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 123, 255, 0.3);
    }

    @keyframes fadeIn {
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

<div class="container">
    <div class="card add-category-card">
        <div class="card-header">
            <h3><i class="bi bi-plus-circle-fill me-2"></i> Tambah Kategori</h3>
        </div>
        <div class="card-body px-5 py-4">
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label><i class="bi bi-tag-fill text-primary me-2"></i>Nama Kategori</label>
                    <input type="text" name="name" class="form-control" placeholder="Masukkan nama kategori..." required>
                </div>
                <div class="mb-3">
                    <label><i class="bi bi-file-earmark-text-fill text-success me-2"></i>Deskripsi</label>
                    <textarea name="description" class="form-control" rows="3" placeholder="Tuliskan deskripsi kategori..."></textarea>
                </div>
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-submit">
                        <i class="bi bi-save-fill me-2"></i> Simpan
                    </button>
                    <a href="{{ route('categories.index') }}" class="btn btn-secondary ms-2 rounded-pill px-4">
                        <i class="bi bi-arrow-left-circle me-1"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
