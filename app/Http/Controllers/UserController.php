<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUser;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id')->paginate(10);
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //return view('welcome');
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|regex:/^[\pL\s\-]+$/u',
            'lastname'=>'required|regex:/^[\pL\s\-]+$/u',
            'rol'=>'required|integer',
            'avatar'=>'required|image|mimes:png,jpeg,svg,jpg|max:1024',
            'phone_number'=>'required|min:8|max:14',
            'email'=>'required',
            'password'=>'required|min:8'
        ]);

        $user = $request->all();
        if(
            $imagen=$request->file('avatar')
            ){
            $ruta = 'img/avatars/';
            $avatar =  date('YmdHis').".".$imagen->guessExtension();
            $imagen->move($ruta,$avatar);
            $user['avatar']="$avatar";
        }
        $user['password']=bcrypt($request -> password);
        User::create($user);
        return redirect()->route('users.index')->with('success', 'Usuario creado con exito');
    }
    public function save(Request $request)
    {
        $user = $request->all();
        if(
            $imagen=$request->file('avatar')
            ){
            $ruta = 'img/avatars/';
            $avatar =  date('YmdHis').".".$imagen->guessExtension();
            $imagen->move($ruta,$avatar);
            $user['avatar']="$avatar";
        }
        $user['password']=bcrypt($request -> password);
        User::create($user);
        return redirect()->route('Auth.login')->with('success', 'Usuario registrado con exito');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name'=>'required|regex:/^[\pL\s\-]+$/u',
            'lastname'=>'required|regex:/^[\pL\s\-]+$/u',
            'rol'=>'required|integer|min:0|max:2|numeric',
            'phone_number'=>'required|min:8|max:14',
            'email'=>'required|email',
        ]);

        $usuario=User::find($request->id);

        $user = $request->all();
        if($imagen=$request->file('avatar')){
            $ruta = 'img/avatars/';
            $avatar =  date('YmdHis').".".$imagen->guessExtension();
            $imagen->move($ruta,$avatar);
            $user['avatar']="$avatar";
        }else{
            unset($user['avatar']);
        }

        $usuario->update($user);
        return redirect()->route('users.index')->with('success', 'Usuario actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Usuario eliminado con exito');;

    }
}
