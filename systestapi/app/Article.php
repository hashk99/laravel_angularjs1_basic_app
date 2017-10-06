<?php
  
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log; 

class Article extends Model
{
	use SoftDeletes; 
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $table = 'articles';

    protected $fillable = [
        'id',
        'title',
        'description',
    ];

    protected $primaryKey = 'id';
      

    /**
     * Get added user
     * @param $const
     * @return mixed
     */
    public function addedUser(){
        return $this->hasOne('App\User','id', 'added_user'); 
    }
    
    public function comments()
    {
        return $this->hasMany('App\Comment',   'article_id');
    }
}
