@extends('layouts.app')

@section('content')
<div class="dashboard-bg"></div>

<div class="container-fluid py-5 px-4 position-relative" style="z-index: 2;">
    <!-- Header -->
    <div class="text-center mb-5">
        <h1 class="fw-bold mb-3 gradient-text display-5">🧾 Daftar Pesanan</h1>
        <p class="subtext fs-5">
            Kelola semua pesanan pelanggan dengan tampilan yang modern dan efisien.
        </p>
    </div>

    <!-- Tombol Tambah Pesanan -->
    <div class="text-end mb-4">
        <a href="{{ route('orders.create') }}" class="btn btn-gradient rounded-pill shadow px-4 py-2">
            <i class="bi bi-plus-circle me-2"></i>Tambah Pesanan
        </a>
    </div>

    <!-- Form Pencarian -->
    <div class="card glass-card border-0 shadow-sm mb-4 rounded-4">
        <div class="card-body">
            <form method="GET" class="d-flex flex-wrap gap-2 align-items-center">
                <div class="flex-grow-1">
                    <input type="text" name="search" placeholder="🔍 Cari nama pelanggan..."
                        class="form-control rounded-pill ps-4" value="{{ request('search') }}">
                </div>
                <button type="submit" class="btn btn-primary rounded-pill px-4">
                    <i class="bi bi-search me-1"></i> Cari
                </button>
                @if(request('search'))
                    <a href="{{ route('orders.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
                        <i class="bi bi-arrow-repeat me-1"></i> Reset
                    </a>
                @endif
            </form>
        </div>
    </div>

    <!-- Tabel Pesanan -->
    <div class="card glass-card border-0 shadow rounded-4">
        <div class="card-body p-4">
            <div class="table-responsive table-container">
                <table class="table align-middle table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Nama Pelanggan</th>
                            <th>Menu</th>
                            <th>Kategori</th>
                            <th>Jumlah</th>
                            <th>Total Harga</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $order)
                            <tr>
                                <td>{{ $loop->iteration + ($orders->firstItem() - 1) }}</td>
                                <td class="fw-semibold text-dark">{{ $order->customer_name }}</td>
                                <td>{{ $order->menu->name ?? '-' }}</td>
                                <td>
                                    <span class="badge bg-gradient-info text-white px-3 py-2 rounded-pill shadow-sm">
                                        {{ $order->menu->category->name ?? 'Tidak ada' }}
                                    </span>
                                </td>
                                <td class="fw-semibold text-center">{{ $order->quantity }}</td>
                                <td class="fw-semibold text-primary">
                                    Rp {{ number_format($order->total_price, 0, ',', '.') }}
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('orders.show', $order) }}" class="btn btn-action btn-view me-1">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('orders.edit', $order) }}" class="btn btn-action btn-edit me-1">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <form action="{{ route('orders.destroy', $order) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-action btn-delete"
                                            onclick="return confirm('Yakin hapus pesanan ini?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-5">
                                    <i class="bi bi-inbox fs-3 d-block mb-2"></i>
                                    Belum ada pesanan yang tercatat.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($orders->hasPages())
                <div class="d-flex justify-content-center mt-4">
                    {{ $orders->links('pagination::bootstrap-5') }}
                </div>
            @endif
        </div>
    </div>
</div>

<!-- STYLE -->
<style>
    /* === Background === */
    .dashboard-bg {
        position: fixed;
        inset: 0;
        background: url("{{ asset('images/lawarplek.jpg') }}") center center / cover no-repeat;
        filter: brightness(0.7) blur(6px);
        z-index: 0;
    }

    /* === Header Text === */
    .gradient-text {
        background: linear-gradient(90deg, #2563eb, #60a5fa);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        text-shadow: 0 3px 8px rgba(37, 99, 235, 0.35);
    }

    .subtext {
        color: rgba(255, 255, 255, 0.9);
        text-shadow: 0 2px 5px rgba(0, 0, 0, 0.25);
    }

    /* === Glass Card === */
    .glass-card {
        background: rgba(255, 255, 255, 0.55);
        backdrop-filter: blur(10px);
        border-radius: 1.25rem;
        border: 1px solid rgba(255, 255, 255, 0.3);
        transition: all 0.3s ease;
    }

    .glass-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    /* === Table === */
    thead {
        background: linear-gradient(90deg, #eff6ff, #dbeafe);
        color: #1e3a8a;
    }

    .table-hover tbody tr:hover {
        background-color: rgba(219, 234, 254, 0.8);
        transition: 0.2s ease;
    }

    /* === Buttons === */
    .btn-gradient {
        background: linear-gradient(135deg, #3b82f6, #60a5fa);
        color: white !important;
        border: none;
        transition: all 0.3s ease;
    }

    .btn-gradient:hover {
        transform: translateY(-2px);
        opacity: 0.95;
        box-shadow: 0 8px 16px rgba(59, 130, 246, 0.3);
    }

    .btn-action {
        border: none;
        padding: 8px 10px;
        border-radius: 50%;
        transition: 0.2s;
    }

    .btn-view {
        background-color: #3b82f6;
        color: white;
    }

    .btn-view:hover {
        background-color: #1e40af;
    }

    .btn-edit {
        background-color: #0ea5e9;
        color: white;
    }

    .btn-edit:hover {
        background-color: #0369a1;
    }

    .btn-delete {
        background-color: #ef4444;
        color: white;
    }

    .btn-delete:hover {
        background-color: #b91c1c;
    }

    /* === Pagination === */
    .page-link {
        border-radius: 50% !important;
        margin: 0 3px;
        color: #1e3a8a;
        border: none;
        box-shadow: 0 0 0 1px #dbeafe inset;
        transition: all 0.2s ease;
    }

    .page-item.active .page-link {
        background: linear-gradient(135deg, #3b82f6, #60a5fa);
        color: #fff;
        box-shadow: 0 0 8px rgba(59, 130, 246, 0.5);
    }

    .page-link:hover {
        background-color: #e0f2fe;
        transform: translateY(-2px);
    }

    /* === Badge === */
    .bg-gradient-info {
        background: linear-gradient(135deg, #3b82f6, #0ea5e9);
    }
</style>
@endsection
