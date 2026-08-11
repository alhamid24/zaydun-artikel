<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SubcategorySeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            'ikan-cupang' => [
                'Makanan Ikan',
                'Aksesoris',
                'Obat & Vitamin',
                'Aquarium & Wadah',
            ],
            'tumbuh-tumbuhan' => [
                'Media Tanam',
                'Pupuk',
                'Pot & Wadah',
                'Alat Berkebun',
            ],
        ];

        foreach ($data as $categorySlug => $subcategories) {
            $category = Category::where('slug', $categorySlug)->first();
            if (!$category) {
                continue;
            }

            foreach ($subcategories as $name) {
                Subcategory::firstOrCreate(
                    ['category_id' => $category->id, 'slug' => Str::slug($name)],
                    ['name' => $name, 'slug' => Str::slug($name)]
                );
            }
        }
    }
}
