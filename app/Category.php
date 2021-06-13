<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'title',
        'label',
        'parent_id',
        'icon',
        'url',
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id')->withDefault(['title' => 'دسته بندی اصلی']);
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function scopeGetAllParent()
    {
        $categories = $this->with('children')->where('parent_id', 0)->get();

        $array = [];
        $array[0] = 'دسته اصلی';
        foreach ($categories as $key => $category) {
            $array[$category->id] = $category->title;

            foreach ($category->children as $key => $value) {
                $array[$value->id] = "زیر دسته : " . $value->title;
            }
        }

        return $array;
    }

    public function filters()
    {
        return $this->hasMany(Filter::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}