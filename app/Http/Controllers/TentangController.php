<?php

namespace App\Http\Controllers;

use App\Models\OwnerProfile;

class TentangController extends Controller
{
    public function index()
    {
        $owner = OwnerProfile::first();
        return view('tentang', compact('owner'));
    }
}
