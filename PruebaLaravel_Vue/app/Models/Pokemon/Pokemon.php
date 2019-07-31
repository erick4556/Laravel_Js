<?php

namespace PruebaLaravel\Models\Pokemon;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
	
	
    public function trainer()
    {
        return $this->belongsTo('PruebaLaravel\Models\Trainer\Trainer');
    }
}
