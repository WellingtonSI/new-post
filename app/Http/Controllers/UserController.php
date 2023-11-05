<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

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

    public function create(UserRequest $request){

        $user = User::create(
            $request->all()
        );

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

        return view('users.index');
    }

    public function show(){
        $users = User::get();

        return response()->json(['data'=>$users],200);
    }   
}
