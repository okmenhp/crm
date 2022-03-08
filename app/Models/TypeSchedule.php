<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeSchedule extends Model
{
    use HasFactory;
    protected $table = 'type_schedule';
    protected $fillable = ['name'];
}
