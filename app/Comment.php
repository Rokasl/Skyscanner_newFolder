<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $connection = "mysql";


    public function group()
    {
        $this->belongsTo(Group::class);
    }
}