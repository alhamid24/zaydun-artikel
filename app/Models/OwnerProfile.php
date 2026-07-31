<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OwnerProfile extends Model
{
    protected $table = 'owner_profile';

    protected $fillable = [
        'name',
        'title',
        'photo',
        'bio',
    ];
}
