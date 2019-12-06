<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cad_contact;
use App\Cad_hists;
use App\Cad_rets;
use Auth;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Contracts\Validation\Validator
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['padrao','admin']);
        return view("contato.contatoRel");
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['padrao','admin']);

        $data = date('Y-m-d', strtotime("+1 days",strtotime(date('Y-m-d'))));
        
        return view("contato.contatoForm")->with(compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Auth::user()->id;
        $validatedData = $request->validate([
            'razao' => 'required|string|max:60',
            'fantazia' => 'required|string|max:60',
            'contato' => 'required|string|max:30',
            'cargo' => 'nullable|string|max:20',
            'telefone' => 'string|nullable',
            'ramal' => 'string|nullable',
            'celular' => 'string|nullable',
            'dataRet' => 'required|date|after:'.today(),
            'email' => 'email:rfc,dns|nullable',
            'historico' => 'required|string'
        ]);

        $contato = new Cad_contact;
        $contato->user_id = Auth::user()->id;
        $contato->contact_razao = $request->input('razao'); 
        $contato->contact_fanta = $request->input('fantazia');
        $contato->contact_contato = $request->input('contato'); 
        $contato->contact_cargo = $request->input('cargo');
        $contato->contact_tel = $request->input('telefone');
        $contato->contact_ramal = $request->input('ramal');
        $contato->contact_cel = $request->input('celular');
        $contato->contact_email = $request->input('email');  
        $contato->save();

        $retorno = new Cad_rets;
        $retorno->contact_id = DB::getPdo()->lastInsertId();
        $retorno->ret_dt = $request->input('dataRet');

        $historico = new Cad_hists;
        $historico->contact_id = DB::getPdo()->lastInsertId();
        $historico->hist_cont = $request->input('historico');    

        $retorno->save();
        $historico->save();
        
        $data = date('Y-m-d', strtotime("+1 days",strtotime(date('Y-m-d'))));
        return redirect()->route('contato.create');
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
    public function edit($id)
    {
        //
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
        //
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
