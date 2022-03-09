<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{

    use HasApiTokens, HasFactory, Notifiable;

    const ROLE_ADMINISTRATOR = 1;

    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $fillable = ['username','full_name','email','password','department_id','position_id','avatar','status','role_id','last_login','timekeeping_code','code','birthday','phone'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function created_at() {
        return date("d/m/Y", strtotime($this->created_at));
    }

    public function Task() {
        return $this->belongsToMany('App\Task', 'user_task', 'task_id', 'user_id');
    }

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
