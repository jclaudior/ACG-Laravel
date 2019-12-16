<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['padrao','admin']);

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $request->user()->authorizeRoles(['padrao','admin']);
        
        $user = User::with('roles')->where('id',$id)->get()->toArray();
        $user = json_decode(json_encode($user), true);
        return view('usuario.edit')->with(compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->user()->authorizeRoles(['padrao','admin']);

        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['nullable','integer', 'min:4', 'confirmed'],
        ]);
        
        if($request->password <> null){
            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->roles()->attach(Role::where('role_name',$request->perm)->first());
        }else{
            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->roles()->attach(Role::where('role_name',$request->perm)->first());
        }

        $user->save();

        $msg = "Usuario ".$request->name."alterado com sucesso!";

        $request->session()->flash('alert-success', 'Usuario alterado com sucesso!');

        return redirect()->route('usuarios.edit', [$id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
