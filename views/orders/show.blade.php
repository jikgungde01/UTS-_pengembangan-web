@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #e3f2fd, #f8f9fa);
        font-family: 'Poppins', sans-serif;
    }

    .order-detail-container {
        max-width: 700px;
        margin: 60px auto;
        background: #ffffff;
        border-radius: 20px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        padding: 40px;
        animation: fadeInUp 0.6s ease;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .order-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .order-header i {
        font-size: 2.5rem;
        color: #0d6efd;
    }

    .order-header h1 {
        font-weight: 700;
        color: #0d6efd;
        margin-top: 10px;
    }

    .order-header p {
        color: #6c757d;
    }

    .detail-card {
        background: #f8f9fa;
        border-radius: 15px;
        padding: 20px;
        margin-bottom: 20px;
    }

    .detail-item {
        margin-bottom: 12px;
    }

    .detail-item strong {
        color: #0d6efd;
        width: 160px;
        display: inline-block;
    }

    .btn-secondary {
        border-radius: 10px;
        padding: 10px 20px;
        font-weight: 600;
        transition: 0.3s;
    }

    .btn-secondary:hover {
        background-color: #495057;
        transform: scale(1.03);
    }

    .total-price {
        font-size: 1.3rem;
        font-weight: 700;
        color: #198754;
    }
</style>

<div class="order-detail-container">
    <div class="order-header">
        <i class="bi bi-receipt-cutoff"></i>
        <h1>Detail Pesanan</h1>
        <p>Informasi lengkap mengenai pesanan pelanggan.</p>
    </div>

    <div class="detail-card">
        <div class="detail-item">
            <strong>Nama Pelanggan:</strong> {{ $order->customer_name }}
        </div>
        <div class="detail-item">
            <strong>Menu:</strong> {{ $order->menu->name ?? 'N/A' }}
        </div>
        <div class="detail-item">
            <strong>Kategori:</strong> {{ $order->menu->category->name ?? 'N/A' }}
        </div>
        <div class="detail-item">
            <strong>Jumlah:</strong> {{ $order->quantity }}
        </div>
        <div class="detail-item">
            <strong>Total Harga:</strong> 
            <span class="total-price">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
        </div>
    </div>

    <div class="text-center mt-4">
        <a href="{{ route('orders.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left-circle me-1"></i> Kembali ke Daftar Pesanan
        </a>
    </div>
</div>
@endsection
