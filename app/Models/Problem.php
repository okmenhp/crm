<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    protected $table = 'problem';
    protected $fillable = ['name','project_id','task_id'];

    public function created_at() {
        return date("d/m/Y", strtotime($this->created_at));
    }

}