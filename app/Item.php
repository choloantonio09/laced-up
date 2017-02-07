<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Item extends Model
{
    protected $fillable = [
    	'category_id', 'brand_id', 'size_id', 'name', 'color_way',
    	'gender_pref', 'price', 'pic', 'description'
    ];

    public function category() {
    	return $this->belongsTo('App\Category', 'category_id');
    }

    public function brand() {
    	return $this->belongsTo('App\Brand', 'brand_id');
    }

    public function size() {
    	return $this->belongsTo('App\Size', 'size_id');
    }
}
