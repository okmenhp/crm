<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Task extends Authenticatable
{

    use HasApiTokens, HasFactory, Notifiable;

    const ROLE_ADMINISTRATOR = 1;
    const MALE = 0;
    const FAMALE = 1;

    protected $table = 'task';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'list_id', 'master_id', 'user_id', 'project_id', 'date', 'time', 'level', 'finish' ];

    public function format_date($time){
        date('d-m-Y', strtotime($time));
    }

}