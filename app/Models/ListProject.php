<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListProject extends Model
{
    use HasFactory;
    protected $table = 'list';
    protected $primaryKey = 'id';
    protected $fillable = ['name','project_id','created_by','updated_by','ordering','status'];
}
