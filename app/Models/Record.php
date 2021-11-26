<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $table = 'records';

    protected $fillable = [
        'fullname', 'telephone', 'email', 'company', 'observation',
    ];

    public function scopeFullName($query, $name)
    {
        if($name):
            return $query->Where('fullname', 'LIKE', "%$name%");
        endif;
    }

    public function scopeCompany($query, $name)
    {
        if($name):
            return $query->Where('company', 'LIKE', "%$name%");
        endif;
    }

    public function scopeStartdate($query, $name)
    {
        if($name):
            return $query->WhereDate('created_at', '>=', "$name");
        endif;
    }

    public function scopeEnddate($query, $name)
    {
        if($name):
            return $query->WhereDate('created_at', '<=', "$name");
        endif;
    }
}
