<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserList extends Controller
{
    public function list(Request $request){
        if($request->all() <> null){
            if($request->por == "nome"){
                $por = "name";
                $valor = $request->valor;
            }
            if($request->por == "email"){
                $por = "email";
                $valor = $request->valor;
            }
            $list = User::with('roles')->where($por,'LIKE',"%$valor%")->orderBy('users.name')->get()->toArray();
        }else{
            $list = User::with('roles')->orderBy('users.name')->get()->toArray();
        }
        $list = json_decode(json_encode($list), true);
        return view('usuario.list')->with(compact('list'));
    }
}
