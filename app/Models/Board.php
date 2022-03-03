<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{

    protected $table = 'list';
    protected $fillable = ['name','project_id','created_by','updated_by','status','ordering'];

    public function created_at() {
        return date("d/m/Y", strtotime($this->created_at));
    }

    public function createdBy() {
        return $this->hasOne('App\Models\User', 'id','created_by');    
    }

}