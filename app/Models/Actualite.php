<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actualite extends Model
{
    use HasFactory;
    protected $fillable = [
        'categorie_id',
        'titre',
        'description1',
        'image1',
        'image2',
        'image3',
        'description2',
    ];
    protected $dates = ['date'];
    
    public function getDateAttribute($value)
    {
        return Carbon::parse($value);
    }

        // Relation avec Category
        public function categorie()
        {
            return $this->belongsTo(Categorie::class);
        }

        public function commentaires()
{
    return $this->hasMany(Commentaire::class);
}
}
