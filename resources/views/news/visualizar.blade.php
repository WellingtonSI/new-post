@extends('layouts.app', ['pageSlug' => 'news-post'])

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card ">
      <div class="card-header">
        <div class="row">
            <div class="col-6">
                <h4 class="card-title">Notícia</h4>
            </div>
        </div>
      </div>
      <div class="card-body">
        <div id='title'>
           <h1>{{$newPost->title}}</h1> 
        </div>
        <hr>
        <div id='newPost'>
            {{$newPost->new_post}}
        </div>
      </div>
    </div>
  </div>
  <input type="hidden" name="new_post" id="new_post" value="{{$newPost->new_post}}">
</div>
@endsection
@section('scripts') 
    var conteudo = $('#new_post').val();
    var elementoHtml = document.getElementById('newPost'); 
    elementoHtml.innerHTML = conteudo;
@endsection

