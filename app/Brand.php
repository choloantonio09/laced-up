<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Brand extends Model
{
    use Notifiable;

    protected $fillable = [
    	'name'
    ];

    public function items() {
    	return $this->hasMany('App\Item', 'brand_id');
    }
}
