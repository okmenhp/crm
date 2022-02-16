<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    const TYPE_FOLDER = 1;
    const TYPE_FILE = 2;
    
    const STATUS_HIDE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_BIN = 2;

    const SHARE_PUBLIC = 1;
    const SHARE_PRIVATE = 2;
    const SHARE_ONLY = 3;

    protected $table = 'file';
    protected $fillable = ['uid','parent_id','created_by','type','format','name','link','size','user_id','status','share'];

    public function created_at() {
        return date("d/m/Y", strtotime($this->created_at));
    }

    public function createdBy() {
        return $this->hasOne('App\User', 'created_by');    
    }

    public function Users() {
        return $this->hasMany('App\FileUser', 'user_id');    
    }

}
