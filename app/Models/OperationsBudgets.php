<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperationsBudgets extends Model
{
    protected $table = 'operations_budgets';
    protected $primaryKey = 'id';
    protected $fillable = ['budget_id','operations','type_operation'];

    use HasFactory;
    public $timestamps = false;

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function Budget()
    {
        return $this->belongsTo(Budget::class, 'budget_id');
    }
}
