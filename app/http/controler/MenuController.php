<?php
namespace App\Http\Controllers;
use App\Models\Menu;
use App\Models\Category; // Untuk dropdown di create/edit
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $query = Menu::with('category'); // Eager loading relasi category
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
        $menus = $query->paginate(5); // Pagination 5 per halaman
        return view('menus.index', compact('menus'));
    }

    public function create()
    {
        $categories = Category::all(); // Untuk dropdown kategori
        return view('menus.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id'
        ]);
        Menu::create($request->all());
        return redirect()->route('menus.index')->with('success', 'Menu berhasil ditambahkan!');
    }

    public function show(Menu $menu)
    {
        $menu->load('category'); // Load relasi
        return view('menus.show', compact('menu'));
    }

    public function edit(Menu $menu)
    {
        $categories = Category::all();
        return view('menus.edit', compact('menu', 'categories'));
    }

    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id'
        ]);
        $menu->update($request->all());
        return redirect()->route('menus.index')->with('success', 'Menu berhasil diperbarui!');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('menus.index')->with('success', 'Menu berhasil dihapus!');
    }
}