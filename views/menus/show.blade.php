@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #e0f2fe, #f8fafc);
        font-family: 'Poppins', sans-serif;
    }

    .menu-detail-card {
        max-width: 700px;
        margin: 80px auto;
        background: #fff;
        border-radius: 25px;
        box-shadow: 0 10px 35px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        animation: fadeInUp 0.6s ease-in-out;
    }

    .card-header {
        background: linear-gradient(90deg, #2563eb, #60a5fa);
        color: white;
        text-align: center;
        padding: 25px 0;
    }

    .card-header h2 {
        font-weight: 700;
        margin: 0;
    }

    .card-body {
        padding: 35px;
    }

    .card-body p {
        font-size: 1.05rem;
        color: #374151;
        margin-bottom: 12px;
        display: flex;
        align-items: center;
    }

    .card-body p strong {
        width: 150px;
        color: #1e293b;
    }

    .menu-icon {
        color: #3b82f6;
        font-size: 2rem;
        margin-right: 10px;
    }

    .btn-custom {
        border-radius: 50px;
        padding: 10px 25px;
        transition: all 0.3s ease;
    }

    .btn-custom:hover {
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
    <div class="menu-detail-card">
        <div class="card-header">
            <h2><i class="bi bi-card-checklist me-2"></i>Detail Menu</h2>
        </div>
        <div class="card-body">
            <p><strong><i class="bi bi-tag-fill text-primary me-2"></i>Nama:</strong> {{ $menu->name }}</p>
            <p><strong><i class="bi bi-file-text-fill text-success me-2"></i>Deskripsi:</strong> {{ $menu->description }}</p>
            <p><strong><i class="bi bi-cash-coin text-warning me-2"></i>Harga:</strong> Rp {{ number_format($menu->price, 0, ',', '.') }}</p>
            <p><strong><i class="bi bi-folder-fill text-info me-2"></i>Kategori:</strong> {{ $menu->category->name ?? 'N/A' }}</p>
        </div>
        <div class="text-center pb-4">
            <a href="{{ route('menus.index') }}" class="btn btn-secondary btn-custom">
                <i class="bi bi-arrow-left-circle me-1"></i> Kembali
            </a>
        </div>
    </div>
</div>
@endsection
