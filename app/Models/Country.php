<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $table = 'countries';

    protected $fillable = [
        'country_code',
        'country_name',
    ];

    public function customers()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = country_id, localKey = id)
        return $this->hasMany(Customer::class, 'country_id', 'id');
    }
}
