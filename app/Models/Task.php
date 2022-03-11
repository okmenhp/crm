<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    const LEVEL_LOW = 1;
    const LEVEL_NORMAL = 2;
    const LEVEL_HIGH = 3;

    protected $table = 'task';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'list_id', 'master_id', 'project_id', 'date', 'intended_start_time', 'intended_end_time', 'level', 'finish', 'attachment', 'description', 'admin_id','parent_id'];

    public function format_date($time){
        date('d-m-Y', strtotime($time));
    }

    public function User() {
        return $this->belongsToMany('App\Models\User', 'user_task', 'user_id', 'task_id');
    }

}
