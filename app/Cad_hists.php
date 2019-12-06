<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cad_hists extends Model
{
    public function contacts(){
        return $this->belongsTo(Cad_contact::class);
    }
}
