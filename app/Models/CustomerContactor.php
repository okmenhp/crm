<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerContactor extends Model
{
    use HasFactory;

    protected $table = 'customer_contactors';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'gender',
        'date_of_birth',
        'id_card',
        'phone_number',
        'email',
        'skype',
        'zalo',
        'wechat',
        'whatsapp',
        'address',
        'country_id',
        'customer_id',
    ];

    public function created_at()
    {
        return date("d/m/Y", strtotime($this->created_at));
    }

    public function type()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
