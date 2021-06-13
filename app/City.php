<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    protected $fillable = [
        'name',
        'label',
        'province_id'
    ];
    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function areas()
    {
        return $this->hasMany(Area::class);
    }
}
