<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerType extends Model
{
    use HasFactory;

    protected $table = 'customer_types';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'code',
        'description',
        'status',
    ];

    public function customers()
    {
        return $this->hasMany(Customer::class, 'customer_type_id', 'id');
    }
}
