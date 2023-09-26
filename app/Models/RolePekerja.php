<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolePekerja extends Model
{
    use HasFactory;
    protected $table = 'role_pekerja';
    protected $fillable = [
        'name'
    ];
}
