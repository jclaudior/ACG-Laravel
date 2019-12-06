<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cad_contact extends Model
{
    public function hists(){

        return $this->hasMany(Cad_hists::class);

    }

    public function rets(){

        return $this->hasMany(Cad_rets::class);

    }
}
