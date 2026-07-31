<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryAdmin;
use Illuminate\Http\Request;

class CategoryAdminController extends Controller
{
    public function index()
    {
        $admins = CategoryAdmin::latest()->get();
        return view('admin.category-admins.index', compact('admins'));
    }

    public function create()
    {
        return view('admin.category-admins.form', ['admin' => new CategoryAdmin()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'title' => 'nullable|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'bio' => 'nullable',
            'phone' => 'nullable|max:20',
            'category' => 'required|in:ikan,tumbuhan',
        ]);

        $admin = new CategoryAdmin();
        $admin->name = $request->name;
        $admin->title = $request->title;
        $admin->bio = $request->bio;
        $admin->phone = $request->phone;
        $admin->category = $request->category;

        if ($request->hasFile('photo')) {
            $imageName = $request->category . '_' . time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('uploads/admins'), $imageName);
            $admin->photo = $imageName;
        }

        $admin->save();

        return redirect('admin/category-admins')->with('success', 'Admin berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $admin = CategoryAdmin::findOrFail($id);
        return view('admin.category-admins.form', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $admin = CategoryAdmin::findOrFail($id);

        $request->validate([
            'name' => 'required|max:255',
            'title' => 'nullable|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'bio' => 'nullable',
            'phone' => 'nullable|max:20',
            'category' => 'required|in:ikan,tumbuhan',
        ]);

        $admin->name = $request->name;
        $admin->title = $request->title;
        $admin->bio = $request->bio;
        $admin->phone = $request->phone;
        $admin->category = $request->category;

        if ($request->hasFile('photo')) {
            if ($admin->photo && file_exists(public_path('uploads/admins/' . $admin->photo))) {
                unlink(public_path('uploads/admins/' . $admin->photo));
            }
            $imageName = $request->category . '_' . time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('uploads/admins'), $imageName);
            $admin->photo = $imageName;
        }

        $admin->save();

        return redirect('admin/category-admins')->with('success', 'Admin berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $admin = CategoryAdmin::findOrFail($id);
        if ($admin->photo && file_exists(public_path('uploads/admins/' . $admin->photo))) {
            unlink(public_path('uploads/admins/' . $admin->photo));
        }
        $admin->delete();

        return redirect('admin/category-admins')->with('success', 'Admin berhasil dihapus!');
    }
}
