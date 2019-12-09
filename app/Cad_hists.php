<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cad_hists extends Model
{
    public function contatos(){
        return $this->belongsTo(Cad_contact::class);
    }

    public function users(){
        return $this->belongsTo(User::class);
    }
}
