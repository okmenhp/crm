<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Employee extends Authenticatable
{

    use HasApiTokens, HasFactory, Notifiable;

    const ROLE_ADMINISTRATOR = 1;
    const MALE = 0;
    const FAMALE = 1;
    
    protected $table = 'employee';
    protected $primaryKey = 'id';
    protected $fillable = ['name','avatar','birthday','folk','department_id','position_id','gender','status','uid','code','checkin_code','date_range','address','email','phone','social','tax_code','day_in','contacter','contacter_phone','id_card'
    ];


    public function department()
    {
        // belongsTo(RelatedModel, foreignKey = _id, keyOnRelatedModel = id)
        return $this->belongsTo(Department::class , 'department_id', 'id');
    }

    public function position()
    {
        // belongsTo(RelatedModel, foreignKey = _id, keyOnRelatedModel = id)
        return $this->belongsTo(Position::class);
    }

    public function format_date($time){
        date('d-m-Y', strtotime($time));
    }

}
