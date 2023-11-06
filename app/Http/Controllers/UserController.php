<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }

    public function create(){

        return view('users.create');
    }
    public function store(Request $request){
     
        try{
            $password = Hash::make($request->password);
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $password
            ]);
   
            Session::flash('message', 'Usuário criado com sucesso!');
            return Redirect::to("/user/management");
         } catch (\Exception  $errors) {
            Session::flash('message', 'Não foi possível criar o usuário!'.$errors);
            return back()->withInput();
         }
         

        return response()->json(['message'=>'Usuário criado com sucesso!','data'=>$user],200);
    }
    public function update(UserRequest $request, int $id){

        $user = User::findOrFail($id);
        $user->update($request->all());

        return response()->json(['message'=>'Usuário atualizado com sucesso!'],200);
    }

    public function delete(int $id){
        
        $user = User::find($id);

        if(is_null($user)){
            return response()->json(['message'=>'Não foi possível encontrar nenhum usuário com esse id'],422);
        }
        
        $user->delete();
        return response()->json(['message'=>'Usuário excluído com sucesso!'],200);
    }

    public function management(){

        $users = User::where('id' ,'<>',auth()->user()->id)->get();
        return view('users.index', ['users' => $users]);
    }

    public function show(){
        $users = User::get();

        return response()->json(['data'=>$users],200);
    }   
}
