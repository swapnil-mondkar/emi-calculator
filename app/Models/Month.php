<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Month extends Model
{
    protected $fillable = ['value'];

    public function emiCombinations()
    {
        return $this->hasMany(EmiCombination::class);
    }
}
