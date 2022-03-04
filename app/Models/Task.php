<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    protected $table = 'task';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'list_id', 'master_id', 'user_id', 'project_id', 'date', 'time', 'level', 'finish', 'attachment', 'description', 'admin_id'];

    public function format_date($time){
        date('d-m-Y', strtotime($time));
    }

}