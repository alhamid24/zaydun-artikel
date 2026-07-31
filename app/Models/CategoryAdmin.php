<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryAdmin extends Model
{
    protected $table = 'category_admins';

    protected $fillable = [
        'name',
        'title',
        'photo',
        'bio',
        'phone',
        'category',
    ];
}
