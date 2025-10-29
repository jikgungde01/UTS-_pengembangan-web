@extends('layouts.app')

@section('content')
<div class="dashboard-bg">
    <div class="overlay"></div>
</div>

<div class="container-fluid py-5 px-4 position-relative" style="z-index: 2;">
    <!-- Header -->
    <div class="text-center mb-5 animate-fade-in">
        <h1 class="fw-bold mb-3 dashboard-title">
             Warung 
            <span class="text-gradient">Lawar Plek Gungde</span>
        </h1>
        <p class="welcome-text fs-5">
            Selamat datang di <strong>Warung Lawar Plek Gungde</strong>! <br>
            Cicipi kuliner tradisional khas Bali yang ekstrem dan unik — 
            perpaduan cita rasa autentik daging, darah segar, dan rempah Nusantara.
        </p>
    </div>

    <!-- Statistik Cards -->
    <div class="row g-4 justify-content-center">
        <div class="col-md-3 animate-scale-up" style="animation-delay: 0.1s">
            <div class="stat-card gradient-blue text-center text-white">
                <div class="icon-circle bg-light text-primary mb-3">
                    <i class="bi bi-folder-fill fs-3"></i>
                </div>
                <h3 class="fw-bold">{{ $totalCategories }}</h3>
                <p class="mb-3">Kategori Menu</p>
                <a href="{{ route('categories.index') }}" class="btn btn-light btn-sm rounded-pill px-3 fw-semibold">
                    Kelola
                </a>
            </div>
        </div>

        <div class="col-md-3 animate-scale-up" style="animation-delay: 0.2s">
            <div class="stat-card gradient-green text-center text-white">
                <div class="icon-circle bg-light text-success mb-3">
                    <i class="bi bi-list-ul fs-3"></i>
                </div>
                <h3 class="fw-bold">{{ $totalMenus }}</h3>
                <p class="mb-3">Menu Tersedia</p>
                <a href="{{ route('menus.index') }}" class="btn btn-light btn-sm rounded-pill px-3 fw-semibold">
                    Kelola
                </a>
            </div>
        </div>

        <div class="col-md-3 animate-scale-up" style="animation-delay: 0.3s">
            <div class="stat-card gradient-yellow text-center text-dark">
                <div class="icon-circle bg-dark text-warning mb-3">
                    <i class="bi bi-receipt fs-3"></i>
                </div>
                <h3 class="fw-bold">{{ $totalOrders }}</h3>
                <p class="mb-3">Total Pesanan</p>
                <a href="{{ route('orders.index') }}" class="btn btn-dark btn-sm rounded-pill px-3 fw-semibold">
                    Kelola
                </a>
            </div>
        </div>

        <div class="col-md-3 animate-scale-up" style="animation-delay: 0.4s">
            <div class="stat-card gradient-red text-center text-white">
                <div class="icon-circle bg-light text-danger mb-3">
                    <i class="bi bi-cash-stack fs-3"></i>
                </div>
                <h3 class="fw-bold">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</h3>
                <p class="mb-3">Total Pendapatan</p>
                <a href="{{ route('orders.index') }}" class="btn btn-light btn-sm rounded-pill px-3 fw-semibold">
                    Lihat Detail
                </a>
            </div>
        </div>
    </div>

    <!-- Navigasi Cepat -->
    <div class="mt-5 animate-slide-up">
        <h4 class="fw-bold mb-3 text-white">⚡ Navigasi Cepat</h4>
        <div class="list-group rounded-4 overflow-hidden glass-list">
            <a href="{{ route('categories.index') }}" class="list-group-item list-group-item-action d-flex align-items-center">
                <i class="bi bi-folder-fill me-3 text-primary fs-5"></i>
                <span>Kelola Kategori Menu</span>
                <i class="bi bi-chevron-right ms-auto text-muted"></i>
            </a>
            <a href="{{ route('menus.index') }}" class="list-group-item list-group-item-action d-flex align-items-center">
                <i class="bi bi-list-ul me-3 text-success fs-5"></i>
                <span>Kelola Menu</span>
                <i class="bi bi-chevron-right ms-auto text-muted"></i>
            </a>
            <a href="{{ route('orders.index') }}" class="list-group-item list-group-item-action d-flex align-items-center">
                <i class="bi bi-receipt me-3 text-warning fs-5"></i>
                <span>Kelola Pesanan</span>
                <i class="bi bi-chevron-right ms-auto text-muted"></i>
            </a>
        </div>
    </div>
</div>

<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Playfair+Display:ital,wght@1,700&display=swap');

/* Background */
.dashboard-bg {
    position: fixed;
    inset: 0;
    background: url("{{ asset('images/lawarplek.jpg') }}") center/cover no-repeat;
    filter: brightness(0.6) blur(3px);
    z-index: 0;
}
.overlay {
    position: absolute;
    inset: 0;
    background: rgba(0, 0, 0, 0.35);
}
body {
    overflow-x: hidden;
    font-family: 'Poppins', sans-serif;
}

/* Header */
.dashboard-title {
    font-size: 3rem;
    color: #ffffff;
    letter-spacing: 1.5px;
    text-shadow: 0 0 12px rgba(255, 255, 255, 0.5);
}

.text-gradient {
    background: linear-gradient(90deg, #3b82f6, #8b5cf6, #06b6d4);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    animation: gradientFlow 6s infinite alternate;
}
@keyframes gradientFlow {
    0% { background-position: 0 50%; }
    100% { background-position: 100% 50%; }
}

/* Teks pembuka */
.welcome-text {
    color: #ffffff !important;
    text-shadow: 0 0 8px rgba(255, 255, 255, 0.3);
}

/* Statistik Card */
.stat-card {
    border-radius: 20px;
    padding: 2rem 1rem;
    box-shadow: 0 10px 25px rgba(0,0,0,0.25);
    transition: all 0.4s ease;
    color: white;
}
.stat-card:hover {
    transform: translateY(-8px) scale(1.03);
    box-shadow: 0 14px 35px rgba(0,0,0,0.3);
}

/* Warna gradasi */
.gradient-blue { background: linear-gradient(135deg, #3b82f6, #2563eb, #60a5fa); }
.gradient-green { background: linear-gradient(135deg, #22c55e, #16a34a, #4ade80); }
.gradient-yellow { background: linear-gradient(135deg, #facc15, #eab308, #fde047); color: #1e293b !important; }
.gradient-red { background: linear-gradient(135deg, #ef4444, #dc2626, #f87171); }

.icon-circle {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 70px;
    height: 70px;
    border-radius: 50%;
    box-shadow: 0 4px 10px rgba(0,0,0,0.3);
}

/* List Group */
.glass-list .list-group-item {
    background: rgba(255, 255, 255, 0.1);
    color: #fff;
    border: none;
    transition: all 0.3s ease;
}
.glass-list .list-group-item:hover {
    background: rgba(255, 255, 255, 0.25);
    transform: translateX(8px);
}

/* Animations */
.animate-fade-in { animation: fadeIn 1.2s ease forwards; }
.animate-slide-up { animation: slideUp 1s ease forwards; }
.animate-scale-up {
    opacity: 0;
    transform: scale(0.8);
    animation: scaleUp 0.7s ease forwards;
}
@keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
@keyframes slideUp { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
@keyframes scaleUp { to { opacity: 1; transform: scale(1); } }
</style>
@endsection
