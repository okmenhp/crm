<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class ProjectType extends Authenticatable
{

    use HasApiTokens, HasFactory, Notifiable;

    const ROLE_ADMINISTRATOR = 1;
    const ACTIVE = 1;
    const INACTIVE = 0;

    protected $table = 'project_type';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'description', 'status'];

    public function created_at()
    {
        return date("d/m/Y", strtotime($this->created_at));
    }
}
