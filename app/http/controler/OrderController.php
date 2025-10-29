<?php
namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Menu; // Untuk dropdown di create/edit
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::with('menu.category'); // Eager loading relasi menu dan category
        if ($request->has('search')) {
            $query->where('customer_name', 'like', '%' . $request->search . '%');
        }
        $orders = $query->paginate(5); // Pagination 5 per halaman
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $menus = Menu::all(); // Untuk dropdown menu
        return view('orders.create', compact('menus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required',
            'quantity' => 'required|integer|min:1',
            'menu_id' => 'required|exists:menus,id'
        ]);
        $menu = Menu::find($request->menu_id);
        $totalPrice = $request->quantity * $menu->price;
        Order::create([
            'customer_name' => $request->customer_name,
            'quantity' => $request->quantity,
            'total_price' => $totalPrice,
            'menu_id' => $request->menu_id
        ]);
        return redirect()->route('orders.index')->with('success', 'Pesanan berhasil ditambahkan!');
    }

    public function show(Order $order)
    {
        $order->load('menu.category'); // Load relasi
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        $menus = Menu::all();
        return view('orders.edit', compact('order', 'menus'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'customer_name' => 'required',
            'quantity' => 'required|integer|min:1',
            'menu_id' => 'required|exists:menus,id'
        ]);
        $menu = Menu::find($request->menu_id);
        $totalPrice = $request->quantity * $menu->price;
        $order->update([
            'customer_name' => $request->customer_name,
            'quantity' => $request->quantity,
            'total_price' => $totalPrice,
            'menu_id' => $request->menu_id
        ]);
        return redirect()->route('orders.index')->with('success', 'Pesanan berhasil diperbarui!');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Pesanan berhasil dihapus!');
    }
}