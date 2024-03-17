<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'authors'; // nazwa tabeli w bazie danych

    protected $fillable = ['name']; // lista kolumn, które można modyfikować

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }
}
