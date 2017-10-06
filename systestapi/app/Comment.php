<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log; 

class Comment extends Model
{
 	use SoftDeletes; 
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $table = 'comments';
 
    protected $fillable = [
        'id',
        'comment_text',
        'user_email',
        'display_name',
        'show_email',
        'article_id' 
    ];

    protected $primaryKey = 'id';
   
    public function article()
    {
        return $this->hasOne('App\Article', 'article_id');
    }
    
}
