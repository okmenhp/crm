<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileUser extends Model
{
    protected $table = 'file_user';
    protected $fillable = ['file_id','user_id'];
    
    public function created_at() {
        return date("d/m/Y", strtotime($this->created_at));
    }

    public function updated_at() {
        return date("d/m/Y", strtotime($this->created_at));
    }

    public function file() {
        return $this->belongsTo('App\File', 'file_id')    
    }
    

}
