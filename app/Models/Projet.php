<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{

    protected $fillable = ['libelle', 'cout','description'];

    use HasFactory;
    public $timestamps = false;
}
