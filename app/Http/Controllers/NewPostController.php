<?php

namespace App\Http\Controllers;

use App\Models\NewPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class NewPostController extends Controller
{
    public function index(){
        $user = auth()->user();

        $newPosts = $user->newPosts;

        return view('news.index', ['newPosts' => $newPosts]);
    }
    public function edit(int $id){

        $newPost = NewPost::FindOrFail($id);

        return view('news.edit', ['newPost' => $newPost]);
    }
    public function create(Request $request){
        return view('news.create');
    }

    public function store(Request $request){
        try{
           $user = auth()->user();
            NewPost::create([
                'title' => $request->title,
                'summary' => $request->summary,
                'new_post' => $request->new_post,
                'user_id' => $user->id
            ]); 

            Session::flash('message', 'Notícia criada com sucesso!');
            return Redirect::to("/news");
        } catch (\Exception  $errors) {
            Session::flash('message', 'Não foi possível criar a notícia!'.$errors);
            return back()->withInput();
        }
        
    }

    public function update(Request $request, int $id){
        
        try{
            $newPost = NewPost::find($id);
            DB::transaction(function() use ($newPost,$request) {
                $newPost->update($request->all());
            });
            
            Session::flash('message', 'Notícia atualizada com sucesso!');
            return Redirect::to("/news");
        } catch (\Exception  $errors) {
            Session::flash('message', 'Não foi possível atualizar a notícia!');
            return back()->withInput();
        }

    }

    public function delete(int $id){
        try{
            $newPost = NewPost::find($id);

            $newPost->delete();
            
            Session::flash('message', 'Notícia excluída com sucesso!');
            return Redirect::to("/news");
        } catch (\Exception  $errors) {
            Session::flash('message', 'Não foi possível excluir a notícia!');
        }
        
    }

    public function show(int $id){
        $newPost = NewPost::FindOrFail($id);

        return view('news.visualizar', ['newPost' => $newPost]);
    }
}
