<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'department';
    protected $fillable = ['name','part_id','status','ordering','description'];

    public function created_at() {
        return date("d/m/Y", strtotime($this->created_at));
    }


    public function users()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = department_id, localKey = id)
        return $this->hasMany(User::class, 'user_id', 'id');
    }

    

}
