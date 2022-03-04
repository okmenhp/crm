<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    protected $fillable = ['name','email','phone','status'];

    public function created_at() {
        return date("d/m/Y", strtotime($this->created_at));
    }


    public function users()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = department_id, localKey = id)
        return $this->hasMany(User::class, 'user_id', 'id');
    }

    public function parents() {
        return $this->belongsTo('\App\Models\Department', 'parent_id');
    }

}