@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #e3f2fd, #f8f9fa);
        font-family: 'Poppins', sans-serif;
    }

    .order-container {
        max-width: 700px;
        margin: 60px auto;
        background: #ffffff;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        padding: 40px;
        transition: all 0.3s ease-in-out;
    }

    .order-container:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
    }

    .order-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .order-header h1 {
        font-weight: 700;
        color: #0d6efd;
    }

    .order-header p {
        color: #6c757d;
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

    .price-option {
        font-size: 0.9rem;
        color: #6c757d;
    }

    .icon-title {
        color: #0d6efd;
        font-size: 2rem;
    }
</style>

<div class="order-container">
    <div class="order-header">
        <i class="bi bi-cart-plus-fill icon-title"></i>
        <h1>Tambah Pesanan</h1>
        <p>Isi detail pesanan pelanggan dengan lengkap dan akurat.</p>
    </div>

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama Pelanggan</label>
            <input type="text" name="customer_name" class="form-control" placeholder="Masukkan nama pelanggan" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Jumlah</label>
            <input type="number" name="quantity" class="form-control" min="1" placeholder="Masukkan jumlah pesanan" required>
        </div>

        <div class="mb-4">
            <label class="form-label">Pilih Menu</label>
            <select name="menu_id" class="form-select" required>
                <option value="" disabled selected>-- Pilih Menu --</option>
                @foreach($menus as $menu)
                <option value="{{ $menu->id }}">
                    {{ $menu->name }} — Rp {{ number_format($menu->price, 0, ',', '.') }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('orders.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left-circle me-1"></i> Kembali
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save2-fill me-1"></i> Simpan Pesanan
            </button>
        </div>
    </form>
</div>
@endsection
