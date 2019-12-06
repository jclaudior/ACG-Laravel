<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cad_rets extends Model
{
    public function contacts(){
        return $this->belongsTo(Cad_contact::class);
    }
}
