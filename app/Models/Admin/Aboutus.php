<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aboutus extends Model
{
    use HasFactory;

    protected $table = 'aboutus';

    protected $casts = [
        'items' => 'array',
    ];

    protected $fillable = [
        'name', 'title', 'description', 'items', 'order',
    ];
}
