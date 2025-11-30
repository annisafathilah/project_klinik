<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Factories\HasFactory;


class Pasien extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $filled = ['no_pasien', 'nama', 'umur', 'foto', 'jenis_kelamin', 'alamat'];
}