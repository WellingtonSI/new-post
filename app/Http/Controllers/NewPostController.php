<?php

namespace App\Http\Controllers;

use App\Models\NewPost;
use Illuminate\Http\Request;

class NewPostController extends Controller
{
    public function create(Request $request){

        $newPost = NewPost::create([
            $request->all()
        ]); 

        return response()->json(['message'=>'Notícia criada  com sucesso!','data'=>$newPost],200);
    }

    public function update(Request $request, int $id){

        $newPost = NewPost::find($id);

        $newPost->update($request->all());

        return response()->json(['message'=>'Notícia atualizada com sucesso!'],200);
    }

    public function delete(int $id){
        $newPost = NewPost::find($id);

        $newPost->delete();

        return response()->json(['message'=>'Notícia excluída com sucesso!'],200);
    }

    public function show(Request $request){
        $user = auth()->user();

        $newPosts = $user->newPosts;

        return response()->json(['data'=>$newPosts],200);
    }
}
