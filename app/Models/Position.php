<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    const ACTIVE = 1;
    const UNACTIVE = 0;


    protected $table = 'position';
    protected $fillable = ['name', 'status'];

    public function created_at()
    {
        return date("d/m/Y", strtotime($this->created_at));
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
