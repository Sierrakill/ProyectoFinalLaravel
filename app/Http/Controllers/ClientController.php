<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clients = Client::orderBy('id')->paginate(10);
        //dd($clients);
        return view('clients.index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('clients.create');
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
        $request->validate([
            'name'=>'required|regex:/^[\pL\s\-]+$/u',
            'lastname'=>'required|regex:/^[\pL\s\-]+$/u',
            'user_id'=>'required|integer',
            'phone_number'=>'required|min:8|max:14',
            'email'=>'required|email',
            'avatar'=>'required|image|mimes:png,jpeg,svg,jpg|max:1024',
            'password'=>'required|min:8'
        ]);
        $client = $request->all();
        if(
            $imagen=$request->file('avatar')
            ){
            $ruta = 'img/avatars/';
            $avatar =  date('YmdHis').".".$imagen->guessExtension();
            $imagen->move($ruta,$avatar);
            $client['avatar']="$avatar";
        }
        $client['password']=bcrypt($request -> password);
        Client::create($client);
        return redirect()->route('clients.index')->with('success', 'Cliente creado con exito');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::find($id);

        return view('clients.show',compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
        return view('clients.edit',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $request->validate([
            'name'=>'required|regex:/^[\pL\s\-]+$/u',
            'lastname'=>'required|regex:/^[\pL\s\-]+$/u',
            'phone_number'=>'required|min:8|max:14',
            'email'=>'required|email',
        ]);

        $cliente=Client::find($id);

        $client = $request->all();
        if($imagen=$request->file('avatar')){
            $ruta = 'img/avatars/';
            $avatar =  date('YmdHis').".".$imagen->guessExtension();
            $imagen->move($ruta,$avatar);
            $client['avatar']="$avatar";
        }else{
            unset($client['avatar']);
        }

        $cliente->update($client);
        return redirect()->route('clients.index')->with('success', 'Cliente actualizado con exito');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index')->with('success', 'Cliente eliminado con exito');;
    }
}
