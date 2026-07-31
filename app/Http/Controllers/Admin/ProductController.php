<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    // 1. Tampilkan Daftar Produk
    public function index()
    {
        $products = Product::with('category')->latest()->get();
        return view('admin.products.index', compact('products'));
    }

    // 2. Tampilkan Form Tambah Produk
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    // 3. Simpan Produk Baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'category_id' => 'required',
            'price' => 'required|numeric',
            'whatsapp_number' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Upload Foto Produk
        $imageName = time().'_product.'.$request->image->extension();  
        $request->image->move(public_path('uploads/products'), $imageName);

        Product::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'category_id' => $request->category_id,
            'price' => $request->price,
            'whatsapp_number' => $request->whatsapp_number,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        return redirect('admin/products')->with('success', 'Produk berhasil ditambahkan!');
    }

    // 4. Hapus Produk
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        
        if(file_exists(public_path('uploads/products/'.$product->image))){
            unlink(public_path('uploads/products/'.$product->image));
        }
        $product->delete();

        return redirect('admin/products')->with('success', 'Produk berhasil dihapus!');
    }
}