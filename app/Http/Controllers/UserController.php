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
    public function edit(int $id){
        try{
            $user = User::FindOrFail($id);

            return view('users.edit', ['user' => $user]);
         } catch (\Exception  $errors) {
            Session::flash('message', 'Não foi possível acessar a página de edição de usuário!');
         }
        
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
            Session::flash('message', 'Não foi possível criar o usuário!');
            return back()->withInput();
         }
         

        return response()->json(['message'=>'Usuário criado com sucesso!','data'=>$user],200);
    }
    public function update(UserRequest $request, int $id){

        try{
            $user = User::findOrFail($id);
            $user->update($request->all());
   
            Session::flash('message', 'Usuário atualizado com sucesso!');
            return Redirect::to("/user/management");
         } catch (\Exception  $errors) {
            Session::flash('message', 'Não foi possível criar o usuário!');
            return back()->withInput();
         }
        
    }

    public function delete(int $id){
        try{
            $user = User::findOrFail($id);
            $user->delete();
   
            Session::flash('message', 'Usuário excluído com sucesso!');
            return Redirect::to("/user/management");
         } catch (\Exception  $errors) {
            Session::flash('message', 'Não foi possível excluir o usuário!');
         }
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
