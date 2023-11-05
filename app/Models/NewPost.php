<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewPost extends Model
{
    use HasFactory;

    protected $fillable = ['title','new_post','user_id'];
}
