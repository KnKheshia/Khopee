<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $guarded = [];

    public function Stuff()
    {
        return $this->belongsTo(Stuff::class); 
    }
    public function Sale()
    {
        return $this->belongsTo(Sale::class);
    }
}
