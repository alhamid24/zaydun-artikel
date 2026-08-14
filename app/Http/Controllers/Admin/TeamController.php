<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::latest()->get();
        return view('admin.teams.index', compact('teams'));
    }

    public function create()
    {
        return view('admin.teams.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'position' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'bio' => 'required'
        ]);

        $imageName = time().'_team.'.$request->image->extension();  
        $request->image->move(public_path('uploads/teams'), $imageName);

        Team::create([
            'name' => $request->name,
            'position' => $request->position,
            'image' => $imageName,
            'bio' => $request->bio,
        ]);

        return redirect()->route('teams.index')->with('success', 'Anggota tim berhasil ditambahkan!');
    }

    public function edit(Team $team)
    {
        return view('admin.teams.edit', compact('team'));
    }

    public function update(Request $request, Team $team)
    {
        $request->validate([
            'name' => 'required|max:255',
            'position' => 'required|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'bio' => 'required'
        ]);

        $data = $request->only(['name', 'position', 'bio']);

        if ($request->hasFile('image')) {
            // Hapus foto lama
            if (File::exists(public_path('uploads/teams/'.$team->image))) {
                File::delete(public_path('uploads/teams/'.$team->image));
            }
            // Upload foto baru
            $imageName = time().'_team.'.$request->image->extension();
            $request->image->move(public_path('uploads/teams'), $imageName);
            $data['image'] = $imageName;
        }

        $team->update($data);

        return redirect()->route('teams.index')->with('success', 'Data anggota tim berhasil diperbarui!');
    }

    public function destroy(Team $team)
    {
        if (File::exists(public_path('uploads/teams/'.$team->image))) {
            File::delete(public_path('uploads/teams/'.$team->image));
        }
        $team->delete();

        return redirect()->route('teams.index')->with('success', 'Anggota tim berhasil dihapus!');
    }
}