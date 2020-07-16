<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'budget_id', 'name', 'type', 'type2', 'unit_price', 'quantity', 'uom', 'total',
    ];

    public function budget()
    {
        return $this->belongsTo('App\Budget');
    }
}
