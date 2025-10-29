<?php
namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil statistik sederhana
        $totalCategories = Category::count();
        $totalMenus = Menu::count();
        $totalOrders = Order::count();
        $totalRevenue = Order::sum('total_price'); // Total pendapatan dari semua pesanan

        // Pass data ke view
        return view('dashboard', compact('totalCategories', 'totalMenus', 'totalOrders', 'totalRevenue'));
    }
}