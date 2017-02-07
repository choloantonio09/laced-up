<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Size extends Model
{
    use Notifiable;

    protected $fillable = [
    	'name'
    ];

    public function items() {
    	return $this->hasMany('App\Item', 'size_id');
    }
}
