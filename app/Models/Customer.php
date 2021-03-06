<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'customer_type_id',
        'tax_number',
        'phone_number',
        'email',
        'skype',
        'zalo',
        'wechat',
        'whatsapp',
        'address',
        'country_id',
        'status',
    ];

    public function created_at()
    {
        return date("d/m/Y", strtotime($this->created_at));
    }

    public function customer_types()
    {
        return $this->belongsTo(CustomerType::class, 'customer_type_id', 'id');
    }

    public function countries()
    {
        // belongsTo(RelatedModel, foreignKey = _id, keyOnRelatedModel = id)
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }
}
