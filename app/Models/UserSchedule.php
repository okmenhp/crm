<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSchedule extends Model
{
    use HasFactory;
    protected $table = 'user_schedule';
    protected $fillable = ['user_id','schedule_id'];
}
