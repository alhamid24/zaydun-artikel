<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class KategoriProdukSeeder extends Seeder
{
    public function run(): void
    {
        $kategori = [
            ['name' => 'Ikan Cupang', 'slug' => 'ikan-cupang', 'icon' => 'fish-icon.png'],
            ['name' => 'Tumbuh-tumbuhan', 'slug' => 'tumbuh-tumbuhan', 'icon' => 'leaf-icon.png'],
        ];

        foreach ($kategori as $data) {
            Category::firstOrCreate(
                ['slug' => $data['slug']],
                [
                    'name' => $data['name'],
                    'slug' => $data['slug'],
                    'icon' => $data['icon'],
                ]
            );
        }
    }
}
