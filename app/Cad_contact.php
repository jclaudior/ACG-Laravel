<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cad_contact extends Model
{
    public function users(){
        return $this->belongsTo(User::class);
    }

    public function hist_ret(){

        return $this->hasMany(Cad_hists::class,Cad_rets::class);

    }

   
}
