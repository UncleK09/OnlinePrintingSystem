<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'order_id';

    public function getservice()
    {
        return $this->belongsTo('App\Models\services', 'service_id');
    }
}
