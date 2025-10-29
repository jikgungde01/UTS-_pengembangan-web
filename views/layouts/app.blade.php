<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warung Lawar Plek Gungde</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css"> <!-- Untuk ikon -->
    <style>
        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            background-color: #343a40;
            padding-top: 20px;
            transition: transform 0.3s;
        }
        .sidebar a {
            color: #ffffff;
            text-decoration: none;
            display: block;
            padding: 10px 20px;
            transition: background-color 0.3s;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .sidebar .brand {
            font-size: 1.5rem;
            font-weight: bold;
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid #495057;
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .sidebar.show {
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="brand">
            <i class="bi bi-shop"></i> Warung Lawar
        </div>
        <a href="{{ route('dashboard') }}">
            <i class="bi bi-house-door me-2"></i> Dashboard
        </a>
        <a href="{{ route('categories.index') }}">
            <i class="bi bi-folder me-2"></i> Kategori
        </a>
        <a href="{{ route('menus.index') }}">
            <i class="bi bi-list me-2"></i> Menu
        </a>
        <a href="{{ route('orders.index') }}">
            <i class="bi bi-receipt me-2"></i> Pesanan
        </a>
    </div>

    <!-- Toggle Button untuk Mobile -->
    <button class="btn btn-dark d-md-none" type="button" onclick="toggleSidebar()" style="position: fixed; top: 10px; left: 10px; z-index: 1050;">
        <i class="bi bi-list"></i>
    </button>

    <!-- Main Content -->
    <main class="main-content">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('show');
        }
    </script>
</body>
</html>