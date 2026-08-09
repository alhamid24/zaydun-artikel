<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    // TAMBAHKAN KODE INI DI DALAM MODEL:
    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'tag',
        'content',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'reading_time',
        'thumbnail',
        'is_published',
        'views',
    ];

    // Kode relasi ke category yang sudah ada sebelumnya biarkan tetap di bawahnya
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}