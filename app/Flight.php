<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    protected $dates = ['dateFrom', 'dateTo'];

    public function votes()
    {
        $this->hasMany(Vote::class);
    }
}
