<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $fillable=[
        'name','label'
    ];

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
