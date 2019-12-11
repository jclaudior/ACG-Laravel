<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cad_rets extends Model
{
    protected $fillable = ['ret_fin'];
    public function contatos(){
        return $this->belongsTo(Cad_contact::class);
    }

    public function users(){
        return $this->belongsTo(User::class);
    }
}
