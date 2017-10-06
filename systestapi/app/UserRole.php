<?php

namespace App;

use Illuminate\Database\Eloquent\Model; 
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;

class UserRole extends Model
{
    use SoftDeletes; 
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $table = 'user_roles';

    protected $fillable = [
        'id','readable_name'
    ];

    protected $primaryKey = 'id';
    
    const ADMINCONST = 'ADMIN';
    const NORMALCONST = 'NORMAL_USER';
       
}
