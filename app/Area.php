<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','label','city_id'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
