<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;
    protected $fillable = [
        'actualite_id',
        'nom',
        'email',
        'message',
    ];

    public function actualite()
    {
        return $this->belongsTo(Actualite::class);
    }

}
