<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['padrao','admin']);

        $id = Auth::user()->id;
        
        $contatos = DB::table('cad_contacts')->join('cad_rets','cad_contacts.id','=','cad_rets.contact_id')
                    ->select('cad_contacts.*','cad_rets.ret_fin')->where('cad_rets.ret_dt',date('Y-m-d'))
                    ->where('cad_contacts.user_id',$id)->get()->toArray();
        
        $contatos = json_decode(json_encode($contatos), true);
        
        return view("home")->with(compact('contatos'));
    }

    public function someAdminStuff(Request $request){
        $request->user()->authorizeRoles('admin');

        return view('some.admin');
    }
}
