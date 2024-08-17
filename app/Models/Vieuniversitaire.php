<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vieuniversitaire extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'image', 'description'];

}
