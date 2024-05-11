<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_feedback extends Model
{
    protected $table = 'order_feedback';
    protected $primaryKey = 'feedback_id';
    use HasFactory;

    public function getorder()
    {
        return $this->belongsTo('App\Models\orders', 'order_id');
    }
    
}
