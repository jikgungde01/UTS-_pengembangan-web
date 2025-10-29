@extends('layouts.app')

@section('content')
<div class="dashboard-bg"></div>

<div class="container-fluid py-5 px-4 position-relative" style="z-index: 2;">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-5 fade-in">
        <div>
            <h1 class="fw-bold mb-2 fancy-title">
                <i class="bi bi-tags-fill me-2 icon-gradient"></i> Daftar Kategori
            </h1>
            <p class="subtitle">Kelola kategori menu dengan tampilan profesional dan menawan ✨</p>
        </div>
        <a href="{{ route('categories.create') }}" class="btn btn-gradient rounded-pill shadow-lg px-4 py-2">
            <i class="bi bi-plus-circle me-2"></i>Tambah Kategori
        </a>
    </div>

    <!-- Form Pencarian -->
    <div class="card white-card border-0 shadow-lg mb-4 rounded-4 fade-up">
        <div class="card-body">
            <form method="GET" class="d-flex flex-wrap gap-2 align-items-center">
                <div class="flex-grow-1 position-relative">
                    <input type="text" name="search" placeholder="🔍 Cari kategori..."
                           class="form-control search-input rounded-pill ps-4 pe-5"
                           value="{{ request('search') }}">
                </div>
                <button type="submit" class="btn btn-primary rounded-pill px-4 shadow-sm">
                    <i class="bi bi-search me-1"></i> Cari
                </button>
                @if(request('search'))
                <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary rounded-pill px-4 shadow-sm">
                    <i class="bi bi-arrow-repeat me-1"></i> Reset
                </a>
                @endif
            </form>
        </div>
    </div>

    <!-- Tabel Kategori -->
    <div class="card white-card border-0 shadow-lg rounded-4 fade-up">
        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table align-middle mb-0 modern-table">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $category)
                        <tr class="table-row fade-up">
                            <td class="text-center fw-semibold">{{ $loop->iteration + ($categories->firstItem() - 1) }}</td>
                            <td class="fw-semibold">{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td class="text-center">
                                <a href="{{ route('categories.show', $category) }}"
                                   class="btn btn-outline-info btn-sm rounded-pill px-3 me-1 hover-glow">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('categories.edit', $category) }}"
                                   class="btn btn-outline-warning btn-sm rounded-pill px-3 me-1 hover-glow">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit"
                                            class="btn btn-outline-danger btn-sm rounded-pill px-3 hover-glow"
                                            onclick="return confirm('Yakin hapus kategori ini?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-5">
                                <i class="bi bi-inbox fs-3 d-block mb-2"></i>
                                Belum ada kategori yang tersedia.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($categories->hasPages())
            <div class="d-flex justify-content-center mt-4">
                {{ $categories->links('pagination::bootstrap-5') }}
            </div>
            @endif
        </div>
    </div>
</div>

<style>
/* === Background === */
.dashboard-bg {
    position: fixed;
    inset: 0;
    background: url("{{ asset('images/lawarplek.jpg') }}") center/cover no-repeat;
    filter: brightness(0.5) blur(6px);
    animation: bgZoom 20s ease-in-out infinite alternate;
    z-index: 0;
}
@keyframes bgZoom { from { transform: scale(1); } to { transform: scale(1.05); } }

/* === Global === */
body {
    font-family: 'Poppins', sans-serif;
    color: #1e293b;
}

/* === Titles === */
.fancy-title {
    font-size: 2.6rem;
    font-weight: 700;
    background: linear-gradient(90deg, #2563eb, #60a5fa);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}
.subtitle {
    color: #ffffff; /* Ubah menjadi putih */
    text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3); /* opsional: tambahkan efek agar lebih terbaca di background */
}


/* === Card === */
.white-card {
    background: rgba(255, 255, 255, 0.92);
    border-radius: 20px;
    box-shadow: 0 10px 35px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
}
.white-card:hover {
    transform: translateY(-3px);
}

/* === Search Input === */
.search-input {
    border: 1px solid #d1d5db;
    background: #fff;
    color: #1e293b;
    box-shadow: 0 0 6px rgba(0,0,0,0.05);
    transition: all 0.3s ease;
}
.search-input:focus {
    border-color: #3b82f6;
    box-shadow: 0 0 12px rgba(59, 130, 246, 0.35);
}

/* === Table Styling === */
.modern-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    overflow: hidden;
    border-radius: 16px;
    background: rgba(255, 255, 255, 0.75);
    backdrop-filter: blur(8px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
}

.modern-table thead {
    background: linear-gradient(90deg, #2563eb, #60a5fa);
    color: white;
}

.modern-table th {
    border: none;
    text-transform: uppercase;
    font-weight: 600;
    letter-spacing: 0.5px;
    padding: 16px 18px;
}

.modern-table tbody tr {
    transition: all 0.3s ease;
    background: rgba(255, 255, 255, 0.7);
}

.modern-table tbody tr:nth-child(even) {
    background: rgba(241, 245, 249, 0.8);
}

.modern-table tbody tr:hover {
    background: rgba(59, 130, 246, 0.1);
    transform: scale(1.01);
    box-shadow: 0 4px 15px rgba(59, 130, 246, 0.2);
}

.modern-table td {
    border-top: 1px solid rgba(226, 232, 240, 0.7);
    padding: 14px 18px;
    vertical-align: middle;
    color: #334155;
}

.table-row i {
    transition: transform 0.2s ease;
}
.table-row:hover i {
    transform: scale(1.2);
}

/* === Empty state === */
.modern-table td.text-muted {
    color: #94a3b8 !important;
}

/* === Pagination === */
.pagination {
    gap: 6px;
}
.page-link {
    border-radius: 50px !important;
    padding: 6px 14px;
    color: #2563eb;
    font-weight: 500;
}
.page-item.active .page-link {
    background: linear-gradient(90deg, #2563eb, #60a5fa);
    border: none;
}
.page-link:hover {
    background: #2563eb;
    color: #fff;
}

/* === Buttons === */
.btn-gradient {
    background: linear-gradient(90deg, #2563eb, #60a5fa);
    color: white;
    border: none;
    transition: all 0.3s ease;
}
.btn-gradient:hover {
    transform: translateY(-2px);
    box-shadow: 0 0 15px rgba(59, 130, 246, 0.5);
}
.hover-glow:hover {
    box-shadow: 0 0 10px rgba(59, 130, 246, 0.3);
}
.btn-outline-info:hover { background: #3b82f6; color: white; border-color: #3b82f6; }
.btn-outline-warning:hover { background: #f59e0b; color: white; border-color: #f59e0b; }
.btn-outline-danger:hover { background: #ef4444; color: white; border-color: #ef4444; }

/* === Animation === */
.fade-in { opacity: 0; animation: fadeIn 1s ease forwards; }
.fade-up { opacity: 0; animation: fadeUp 1s ease forwards; }
@keyframes fadeIn { from { opacity: 0; transform: translateY(-15px); } to { opacity: 1; transform: translateY(0); } }
@keyframes fadeUp { from { opacity: 0; transform: translateY(25px); } to { opacity: 1; transform: translateY(0); } }
</style>
@endsection
