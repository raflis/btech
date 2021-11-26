<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $table = 'partners';

    protected $casts = [
        'items' => 'array',
    ];

    protected $fillable = [
        'name', 'image', 'description', 'items', 'order',
    ];
}
