<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OwnerProfile;
use Illuminate\Http\Request;

class OwnerProfileController extends Controller
{
    public function edit()
    {
        $profile = OwnerProfile::first() ?? new OwnerProfile();
        return view('admin.owner-profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'title' => 'nullable|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'bio' => 'nullable',
        ]);

        $profile = OwnerProfile::first();
        if (!$profile) {
            $profile = new OwnerProfile();
        }

        $profile->name = $request->name;
        $profile->title = $request->title;
        $profile->bio = $request->bio;

        if ($request->hasFile('photo')) {
            if ($profile->photo && file_exists(public_path('uploads/owner/' . $profile->photo))) {
                unlink(public_path('uploads/owner/' . $profile->photo));
            }
            $imageName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('uploads/owner'), $imageName);
            $profile->photo = $imageName;
        }

        $profile->save();

        return redirect('admin/owner-profile')->with('success', 'Profil pemilik berhasil diperbarui!');
    }

    public function destroy()
    {
        $profile = OwnerProfile::first();
        if ($profile) {
            if ($profile->photo && file_exists(public_path('uploads/owner/' . $profile->photo))) {
                unlink(public_path('uploads/owner/' . $profile->photo));
            }
            $profile->delete();
        }
        return redirect('admin/owner-profile')->with('success', 'Profil pemilik berhasil dihapus!');
    }
}
