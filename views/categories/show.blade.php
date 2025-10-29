@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #e3f2fd, #ffffff);
        font-family: 'Poppins', sans-serif;
    }

    .detail-card {
        max-width: 650px;
        margin: 80px auto;
        background: #fff;
        border: none;
        border-radius: 20px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        animation: fadeInUp 0.6s ease-in-out;
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

    .card-body p {
        font-size: 1rem;
        color: #555;
        margin-bottom: 10px;
    }

    .card-body strong {
        color: #212529;
    }

    .btn-custom {
        border-radius: 50px;
        padding: 10px 25px;
        transition: 0.3s ease;
    }

    .btn-custom:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 123, 255, 0.3);
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
    <div class="card detail-card">
        <div class="card-header">
            <h3><i class="bi bi-folder-fill me-2"></i> Detail Kategori</h3>
        </div>
        <div class="card-body px-5 py-4">
            <p><strong><i class="bi bi-tag-fill me-2 text-primary"></i>Nama:</strong> {{ $category->name }}</p>
            <p><strong><i class="bi bi-file-text-fill me-2 text-success"></i>Deskripsi:</strong> {{ $category->description }}</p>
        </div>
        <div class="card-footer text-center bg-transparent pb-4">
            <a href="{{ route('categories.index') }}" class="btn btn-secondary btn-custom">
                <i class="bi bi-arrow-left-circle me-1"></i> Kembali
            </a>
        </div>
    </div>
</div>
@endsection
