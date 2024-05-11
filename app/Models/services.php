<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class services extends Model
{
    use HasFactory;

    protected $primaryKey = 'service_id';

    public function getcategory()
    {
        return $this->belongsTo('App\Models\category', 'service_category');
    }
}
