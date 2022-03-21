<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
   

    const TYPE_PUBLIC = 1; 
    const TYPE_PRIVATE = 2;

    protected $table = 'project';
    protected $primaryKey = 'id';
    protected $fillable = ['name','created_by','manager','name','description','visibility','attachment','status'];

    public function created_at() {
        return date("d/m/Y", strtotime($this->created_at));
    }

    public function createdBy() {
        return $this->hasOne('App\Models\User', 'id','created_by');    
    }

}