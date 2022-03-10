<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    const PATTERN_NORMAL = 1; 
    const PATTERN_REPEAT = 2;

    protected $table = 'schedule';
    protected $fillable = ['uid','title','start_date','end_date','location','meeting_id','description','pattern','wday','mday','type_id','all_day'];

    public function users() {
        return $this->belongsToMany('App\Models\User', 'user_schedule', 'schedule_id', 'user_id');
    }
}
