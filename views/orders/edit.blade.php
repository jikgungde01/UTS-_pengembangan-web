@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #e3f2fd, #f8f9fa);
        font-family: 'Poppins', sans-serif;
    }

    .edit-order-container {
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

    .form-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .form-header i {
        font-size: 2.5rem;
        color: #0d6efd;
    }

    .form-header h1 {
        font-weight: 700;
        color: #0d6efd;
        margin-top: 10px;
    }

    .form-header p {
        color: #6c757d;
    }

    label {
        font-weight: 600;
        color: #374151;
    }

    .form-control {
        border-radius: 10px;
        padding: 10px 15px;
        border: 1px solid #ced4da;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 6px rgba(13, 110, 253, 0.3);
    }

    .btn-primary {
        border-radius: 10px;
        font-weight: 600;
        padding: 10px 25px;
        transition: 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0b5ed7;
        transform: scale(1.03);
    }

    .btn-back {
        border-radius: 10px;
        font-weight: 600;
        padding: 10px 25px;
        background-color: #6c757d;
        color: white;
        text-decoration: none;
        transition: 0.3s;
    }

    .btn-back:hover {
        background-color: #495057;
        transform: scale(1.03);
    }
</style>

<div class="edit-order-container">
    <div class="form-header">
        <i class="bi bi-pencil-square"></i>
        <h1>Edit Pesanan</h1>
        <p>Perbarui detail pesanan pelanggan dengan mudah.</p>
    </div>

    <form action="{{ route('orders.update', $order) }}" method="POST">
        @csrf 
        @method('PUT')

        <div class="mb-3">
            <label for="customer_name">Nama Pelanggan</label>
            <input type="text" name="customer_name" id="customer_name" class="form-control" 
                   value="{{ $order->customer_name }}" required>
        </div>

        <div class="mb-3">
            <label for="quantity">Jumlah</label>
            <input type="number" name="quantity" id="quantity" class="form-control" 
                   min="1" value="{{ $order->quantity }}" required>
        </div>

        <div class="mb-3">
            <label for="menu_id">Menu</label>
            <select name="menu_id" id="menu_id" class="form-control" required>
                @foreach($menus as $menu)
                    <option value="{{ $menu->id }}" 
                        {{ $order->menu_id == $menu->id ? 'selected' : '' }}>
                        {{ $menu->name }} (Rp {{ number_format($menu->price, 0, ',', '.') }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('orders.index') }}" class="btn-back">
                <i class="bi bi-arrow-left-circle me-1"></i> Kembali
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save-fill me-1"></i> Update
            </button>
        </div>
    </form>
</div>
@endsection
