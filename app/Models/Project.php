<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'project';
    protected $fillable = [
        'name',
        'lokasi',
        'waktu_mulai',
        'waktu_selesai',
        'total_pekerja',
        'nama_mandor',
        'nilai_project',
        'status',
        'foto'
    ];
}
