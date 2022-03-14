<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColorSchedule extends Model
{
    use HasFactory;
    protected $table = 'color_schedule';
    protected $fillable = ['name','value'];
}
