<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    protected $table = 'budgets';
    protected $primaryKey = 'id';
    protected $fillable = ['libelle', 'somme', 'user_id'];

    use HasFactory;
    public $timestamps = false;

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
