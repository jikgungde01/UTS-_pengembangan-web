@extends('layouts.app')

@section('content')
<div class="menu-page position-relative py-5 px-4">
    <div class="menu-overlay"></div>

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-5 position-relative z-2 animate-slide-down">
        <div>
            <h1 class="fw-bold mb-1 text-gradient">🍽️ Daftar Menu</h1>
            <p class="text-light mb-0">Kelola semua makanan dan minuman yang dijual di warung kamu.</p>
        </div>
        <a href="{{ route('menus.create') }}" class="btn btn-gradient rounded-pill shadow px-4 py-2">
            <i class="bi bi-plus-circle me-2"></i>Tambah Menu
        </a>
    </div>

    <!-- Form Pencarian -->
    <div class="card glass-card mb-4 rounded-4 animate-fade-in">
        <div class="card-body">
            <form method="GET" class="d-flex flex-wrap gap-2 align-items-center">
                <div class="flex-grow-1">
                    <input type="text" name="search" placeholder="🔍 Cari menu..." class="form-control rounded-pill ps-4" value="{{ request('search') }}">
                </div>
                <button type="submit" class="btn btn-primary rounded-pill px-4">
                    <i class="bi bi-search me-1"></i> Cari
                </button>
                @if(request('search'))
                <a href="{{ route('menus.index') }}" class="btn btn-outline-light rounded-pill px-4">
                    <i class="bi bi-arrow-repeat me-1"></i> Reset
                </a>
                @endif
            </form>
        </div>
    </div>

    <!-- Tabel Menu -->
    <div class="card glass-card rounded-4 animate-scale-up">
        <div class="card-body table-responsive">
            <table class="table align-middle table-hover text-white mb-0">
                <thead class="table-dark rounded-top">
                    <tr>
                        <th>#</th>
                        <th>Nama Menu</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($menus as $menu)
                    <tr>
                        <td>{{ $loop->iteration + ($menus->firstItem() - 1) }}</td>
                        <td class="fw-semibold">{{ $menu->name }}</td>
                        <td>
                            <span class="badge bg-info text-dark px-3 py-2 rounded-pill">
                                {{ $menu->category->name ?? 'Tidak ada' }}
                            </span>
                        </td>
                        <td class="fw-semibold text-success">
                            Rp {{ number_format($menu->price, 0, ',', '.') }}
                        </td>
                        <td class="text-center">
                            <a href="{{ route('menus.show', $menu) }}" class="btn btn-outline-info btn-sm rounded-pill px-3 me-1">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('menus.edit', $menu) }}" class="btn btn-outline-warning btn-sm rounded-pill px-3 me-1">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('menus.destroy', $menu) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill px-3" onclick="return confirm('Yakin hapus menu ini?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-light py-4">
                            <i class="bi bi-inbox fs-3 d-block mb-2"></i>
                            Belum ada menu yang tersedia.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Pagination -->
            @if($menus->hasPages())
            <div class="d-flex justify-content-center mt-4">
                {{ $menus->links('pagination::bootstrap-5') }}
            </div>
            @endif
        </div>
    </div>
</div>

<!-- 🌈 Gaya tambahan -->
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;700&display=swap');

body {
    background: linear-gradient(135deg, #1e293b, #0f172a);
    font-family: 'Poppins', sans-serif;
    color: #fff;
}

.menu-page {
    position: relative;
    min-height: 100vh;
}

.menu-overlay {
    position: fixed;
    inset: 0;
    background: url("{{ asset('images/lawarplek.jpg') }}") center/cover no-repeat;
    filter: brightness(0.4) blur(4px);
    z-index: 0;
}

/* Glass Effect Cards */
.glass-card {
    background: rgba(255, 255, 255, 0.12);
    backdrop-filter: blur(16px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    color: white;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
}

/* Header Text Gradient */
.text-gradient {
    background: linear-gradient(90deg, #38bdf8, #6366f1, #8b5cf6);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    animation: flow 5s ease infinite;
    background-size: 200% auto;
}
@keyframes flow {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

/* Buttons */
.btn-gradient {
    background: linear-gradient(90deg, #06b6d4, #3b82f6);
    border: none;
    color: #fff;
    transition: all 0.3s ease;
}
.btn-gradient:hover {
    background: linear-gradient(90deg, #3b82f6, #06b6d4);
    transform: translateY(-2px);
    box-shadow: 0 0 12px rgba(59, 130, 246, 0.5);
}

/* Table */
.table {
    border-collapse: separate;
    border-spacing: 0 0.5rem;
}
.table thead {
    background-color: rgba(255, 255, 255, 0.15);
}
.table-hover tbody tr:hover {
    background-color: rgba(255, 255, 255, 0.1);
    transform: scale(1.01);
    transition: all 0.2s ease;
}

/* Pagination */
.page-link {
    border-radius: 50% !important;
    margin: 0 3px;
    color: #fff;
    background: rgba(255,255,255,0.1);
    border: none;
}
.page-item.active .page-link {
    background: linear-gradient(90deg, #3b82f6, #06b6d4);
    box-shadow: 0 0 6px rgba(59,130,246,0.6);
}
.page-link:hover {
    background: rgba(255,255,255,0.2);
}

/* Animations */
.animate-fade-in { animation: fadeIn 1s ease forwards; }
.animate-scale-up { animation: scaleUp 0.8s ease forwards; }
.animate-slide-down { animation: slideDown 1s ease forwards; }

@keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
@keyframes scaleUp { from { opacity: 0; transform: scale(0.9); } to { opacity: 1; transform: scale(1); } }
@keyframes slideDown { from { opacity: 0; transform: translateY(-30px); } to { opacity: 1; transform: translateY(0); } }
</style>
@endsection
