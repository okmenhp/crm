<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    protected $fillable = ['name', 'email', 'phone', 'status'];

    public function created_at()
    {
        return date("d/m/Y", strtotime($this->created_at));
    }

    public function parents()
    {
        return $this->belongsTo(CustomerType::class, 'type', 'id');
    }
}
