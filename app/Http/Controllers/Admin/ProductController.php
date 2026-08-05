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
            'stock' => 'required|integer|min:0',
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
            'stock' => $request->stock,
            'whatsapp_number' => $request->whatsapp_number,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        return redirect('admin/products')->with('success', 'Produk berhasil ditambahkan!');
    }

    // 4. Tampilkan Form Edit Produk
    public function edit($id)
    {
        $product = Product::with('category')->findOrFail($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    // 5. Simpan Perubahan Produk
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'category_id' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer|min:0',
            'whatsapp_number' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $product = Product::findOrFail($id);

        $data = [
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'stock' => $request->stock,
            'whatsapp_number' => $request->whatsapp_number,
            'description' => $request->description,
        ];

        // Jika foto diganti, upload yang baru lalu hapus yang lama
        if ($request->hasFile('image')) {
            if (file_exists(public_path('uploads/products/'.$product->image))) {
                unlink(public_path('uploads/products/'.$product->image));
            }
            $imageName = time().'_product.'.$request->image->extension();
            $request->image->move(public_path('uploads/products'), $imageName);
            $data['image'] = $imageName;
        }

        $product->update($data);

        return redirect('admin/products')->with('success', 'Produk "'.$product->name.'" berhasil diperbarui!');
    }

    // 6. Hapus Produk
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        
        if(file_exists(public_path('uploads/products/'.$product->image))){
            unlink(public_path('uploads/products/'.$product->image));
        }
        $product->delete();

        return redirect('admin/products')->with('success', 'Produk berhasil dihapus!');
    }

    // 5. Update Stok Produk
    public function updateStock(Request $request, $id)
    {
        $request->validate([
            'stock' => 'required|integer|min:0',
        ]);

        $product = Product::findOrFail($id);
        $product->update(['stock' => $request->stock]);

        return redirect('admin/products')->with('success', 'Stok "'.$product->name.'" berhasil diperbarui menjadi '.$request->stock.'!');
    }
}