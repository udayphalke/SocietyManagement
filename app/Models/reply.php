<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reply extends Model
{
    use HasFactory;
    protected $table="replies";
    protected $fillable =[
        'comment_id',
        'name',
        'reply',
        'date1',
        'user_id'
    ];
}
