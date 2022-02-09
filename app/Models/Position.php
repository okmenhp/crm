<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    const STATUS_ACTIVE = 1;
    const STATUS_UNACTIVE = 0;

    protected $table = 'position';
    protected $fillable = ['name', 'status', 'note'];

    public function created_at()
    {
        return date("d/m/Y", strtotime($this->created_at));
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
