<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    // Fungsi bantuan untuk mencari data kategori berdasarkan URL (ikan/tumbuhan)
    private function getCategory($slug)
    {
        // Mencari kategori yang namanya mengandung kata 'ikan' atau 'tumbuhan'
        $category = Category::where('name', 'LIKE', "%{$slug}%")->first();
        
        if (!$category) {
            abort(404, 'Kategori tidak ditemukan di database.');
        }
        return $category;
    }

    // 1. Tampilkan Daftar Produk
    public function index($category_slug)
    {
        $category = $this->getCategory($category_slug);
        
        // Filter produk khusus untuk kategori yang sedang dibuka
        $products = Product::with('category')
            ->where('category_id', $category->id)
            ->latest()
            ->get();
            
        return view('admin.products.index', compact('products', 'category_slug', 'category'));
    }

    // 2. Tampilkan Form Tambah Produk
    public function create($category_slug)
    {
        $category = $this->getCategory($category_slug);
        $categories = Category::all();

        
        return view('admin.products.create', compact('categories', 'category_slug', 'category'));
    }

    // 3. Simpan Produk Baru
    public function store(Request $request, $category_slug)
    {
        $category = $this->getCategory($category_slug);

        $request->validate([
            'name' => 'required|max:255',

            // category_id tidak perlu divalidasi dari form lagi, kita set otomatis di bawah

            'price' => 'required|numeric',
            'stock' => 'required|integer|min:0',
            'whatsapp_number' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // Upload Foto Produk
        $imageName = time().'_product.'.$request->image->extension();  
        $request->image->move(public_path('uploads/products'), $imageName);

        Product::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),

            'category_id' => $category->id, // Otomatis diset berdasarkan submenu

            'price' => $request->price,
            'stock' => $request->stock,
            'whatsapp_number' => $request->whatsapp_number,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        // Redirect kembali ke submenu yang sesuai
        return redirect("admin/products/{$category_slug}")->with('success', 'Produk berhasil ditambahkan!');
    }

    // 4. Tampilkan Form Edit Produk
    public function edit($category_slug, $id)
    {
        $product = Product::with('category')->findOrFail($id);
        $categories = Category::all();

        
        return view('admin.products.edit', compact('product', 'categories', 'category_slug'));

    }

    // 5. Simpan Perubahan Produk
    public function update(Request $request, $category_slug, $id)
    {
        $request->validate([
            'name' => 'required|max:255',

            'category_id' => 'required', // Boleh diubah jika admin salah input kategori

            'price' => 'required|numeric',
            'stock' => 'required|integer|min:0',
            'whatsapp_number' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $product = Product::findOrFail($id);

        $data = [
            'name' => $request->name,

            'slug' => Str::slug($request->name),
            'category_id' => $request->category_id, 

            'price' => $request->price,
            'stock' => $request->stock,
            'whatsapp_number' => $request->whatsapp_number,
            'description' => $request->description,
        ];

        // Jika foto diganti
        if ($request->hasFile('image')) {
            if (file_exists(public_path('uploads/products/'.$product->image))) {
                unlink(public_path('uploads/products/'.$product->image));
            }
            $imageName = time().'_product.'.$request->image->extension();
            $request->image->move(public_path('uploads/products'), $imageName);
            $data['image'] = $imageName;
        }

        $product->update($data);

        return redirect("admin/products/{$category_slug}")->with('success', 'Produk "'.$product->name.'" berhasil diperbarui!');
    }

    // 6. Hapus Produk
    public function destroy($category_slug, $id)
    {
        $product = Product::findOrFail($id);
        
        if(file_exists(public_path('uploads/products/'.$product->image))){
            unlink(public_path('uploads/products/'.$product->image));
        }
        $product->delete();

        return redirect("admin/products/{$category_slug}")->with('success', 'Produk berhasil dihapus!');
    }

    // 7. Update Stok Produk
    public function updateStock(Request $request, $category_slug, $id)
    {
        $request->validate([
            'stock' => 'required|integer|min:0',
        ]);

        $product = Product::findOrFail($id);
        $product->update(['stock' => $request->stock]);

        return redirect("admin/products/{$category_slug}")->with('success', 'Stok "'.$product->name.'" berhasil diperbarui!');
    }
}