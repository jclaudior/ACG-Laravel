<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cad_rets extends Model
{
    public function contatos(){
        return $this->belongsTo(Cad_contact::class);
    }

    public function users(){
        return $this->belongsTo(User::class);
    }
}
