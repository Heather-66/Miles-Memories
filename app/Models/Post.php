<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\ELoquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $fillable = ['title', 'description', 'image', 'user_id', 'user_name'];
    
    protected $dates =['delete_at'];
}
