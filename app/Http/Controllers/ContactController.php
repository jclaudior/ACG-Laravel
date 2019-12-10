<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cad_contact;
use App\Cad_hists;
use App\Cad_rets;
use App\User;
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
        $valores = $request->all();

        $request->user()->authorizeRoles(['padrao','admin']);

        $users = DB::table('users')->select('id','name')->get();

        $users = json_decode(json_encode($users), true);

        if($request->input('id') <> null){
            $id = $request->input('id');
        }
        else{
            $id = Auth::user()->id;
        }

        $retornos = null;
        $contatos = null;

        if($request->input('tipo') == 2){
            if($request->input('DI') <> null && $request->input('DF') <> null && $request->input('F') <> null && $request->input('NF') <> null){
                $retornos = DB::table('cad_contacts')->join('cad_rets','cad_contacts.id','=','cad_rets.contact_id')
                            ->join('users','cad_contacts.user_id','=','users.id')
                            ->select('cad_contacts.*','cad_rets.ret_fin','cad_rets.ret_dt','users.name')->where('cad_rets.ret_dt','>=',$request->input('DI'))
                            ->where('cad_rets.ret_dt','<=',$request->input('DF'))->where('cad_contacts.user_id',$id)
                            ->get()
                            ->toArray();
                $retornos = json_decode(json_encode($retornos), true);
            }

            if($request->input('DI') <> null && $request->input('DF') <> null && $request->input('F') == null && $request->input('NF') <> null){
                $retornos = DB::table('cad_contacts')->join('cad_rets','cad_contacts.id','=','cad_rets.contact_id')
                            ->join('users','cad_contacts.user_id','=','users.id')
                            ->select('cad_contacts.*','cad_rets.ret_fin','cad_rets.ret_dt','users.name')->where('cad_rets.ret_dt','>=',$request->input('DI'))
                            ->where('cad_rets.ret_dt','<=',$request->input('DF'))->where('cad_contacts.user_id',$id)->where('cad_rets.ret_fin',0)
                            ->get()
                            ->toArray();
                $retornos = json_decode(json_encode($retornos), true);
            }

            if($request->input('DI') <> null && $request->input('DF') <> null && $request->input('F') <> null && $request->input('NF') == null){
                $retornos = DB::table('cad_contacts')->join('cad_rets','cad_contacts.id','=','cad_rets.contact_id')
                            ->join('users','cad_contacts.user_id','=','users.id')
                            ->select('cad_contacts.*','cad_rets.ret_fin','cad_rets.ret_dt','users.name')->where('cad_rets.ret_dt','>=',$request->input('DI'))
                            ->where('cad_rets.ret_dt','<=',$request->input('DF'))->where('cad_contacts.user_id',$id)->where('cad_rets.ret_fin',1)
                            ->get()
                            ->toArray();
                $retornos = json_decode(json_encode($retornos), true);
            }
        }
        else if($request->input('tipo') == 1){
            if($request->input('DI') <> null && $request->input('DF') <> null){
                $contatos = DB::table('cad_contacts')->join('cad_rets','cad_contacts.id','=','cad_rets.contact_id')
                            ->join('users','cad_contacts.user_id','=','users.id')
                            ->select('cad_contacts.*','cad_rets.ret_fin','users.name')->where('cad_contacts.created_at','>=',$request->input('DI'))
                            ->where('cad_contacts.created_at','<=',$request->input('DF'))->where('cad_contacts.user_id',$id)
                            ->get()
                            ->toArray();
                $contatos = json_decode(json_encode($contatos), true);
            }
        }

        if($retornos<>null){
            $fin = 0;
            $nfin = 0;
            for($i=0;$i <  count($retornos);$i++){
                if($retornos[$i]['ret_fin'] == 0){
                    $nfin ++;
                }
                if($retornos[$i]['ret_fin'] == 1){
                    $fin ++;
                }
            }
        }
        if($valores == null){
            $valores = [
                'tipo' => "2",
                'userID' => "",
                'DI' => "",
                'DF' => "",
                'F' => "F",
                'NF' => "NF",
            ];
        }
        return view("contato.contatoRel")->with(compact('retornos'))
                                        ->with(compact('users'))
                                        ->with(compact('fin'))
                                        ->with(compact('nfin'))
                                        ->with(compact('contatos'))
                                        ->with(compact('valores'));

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
        $retorno->user_id = Auth::user()->id;
        $retorno->ret_dt = $request->input('dataRet');

        $historico = new Cad_hists;
        $historico->contact_id = DB::getPdo()->lastInsertId();
        $historico->user_id = Auth::user()->id;
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
    public function show(Request $request, $id)
    {
        $request->user()->authorizeRoles(['padrao','admin']);

        $contato = DB::table('cad_contacts')->join('cad_rets','cad_contacts.id','=','cad_rets.contact_id')
                            ->join('cad_hists','cad_contacts.id','=','cad_hists.contact_id')
                            ->select('cad_contacts.*','cad_rets.ret_fin','cad_rets.ret_dt','cad_hists.hist_cont','cad_hists.created_at AS hist_dt','cad_hists.id AS hist_id')
                            ->where('cad_contacts.id',$id)
                            ->get()
                            ->toArray();
    
        $contato = json_decode(json_encode($contato), true);
        
        
        return view('contato.contatoInfo')->with(compact('contato'));
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
