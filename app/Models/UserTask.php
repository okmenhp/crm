<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserTask extends Model
{
    protected $table = 'user_task';
    protected $fillable = ['user_id','task_id'];
}
