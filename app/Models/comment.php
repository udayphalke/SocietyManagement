<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    protected $fillable =array(
        'name',
        'comment',
        'date1',
        'user_id'
    );
    public function replies()
    {
        return $this->hasMany('App\Models\Reply');
    }
}
