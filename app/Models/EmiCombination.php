<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmiCombination extends Model
{
    protected $fillable = [
        'month_id',
        'min_amount',
        'max_amount',
        'interest_rate',
    ];

    public function month()
    {
        return $this->belongsTo(Month::class);
    }
}
