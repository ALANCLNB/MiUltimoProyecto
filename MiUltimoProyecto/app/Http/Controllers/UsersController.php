<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;
use Hash;

class UsersController extends Controller
{
    


    public function index(){

        $usuarios = \DB::table('users')
        ->select('users.*')
        ->orderBy('id','DESC')
        ->get();
        return view('usuarios')->with('usuarios',$usuarios);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nombre' => 'required|min:3|max:50',
            'email'=> 'required|email',
            'password'=> 'required|min:3|max:50|required_with:password2|same:password2',
            'password2'=> 'required|min:3|max:50'

        ]);
        if($validator->fails()){
            //dd('Favor de llenar todos los campos');
            return back()->withInput()
            ->with('ErrorInsert','Favor de llenar todos los campos')
            ->withErrors($validator);
        }else{
            //dd('Todo chido');
            $usuario = User::create([
                'name' => $request->nombre,
                'img' => 'img.jpg',
                'nivel' => 'usuario',
                'email' => $request->email,
                'password' => $request->password

            ]);
            return back()->with('Listo','Se ha insertado correctamente');
        }
        //dd($request);
    }


    public function destroy($id){

    //dd($id);
    $user = User::find($id);
    if($user->img != 'default.jpg'){
        if(file_exists(public_path('users_img/'.$user->img))){
        unlink(public_path('users_img/'.$user->img));
        }
    }
        $user->delete();
        return back()->with('Listo','Se elimino correctamente');
    }


}
