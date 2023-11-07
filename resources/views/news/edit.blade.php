@extends('layouts.app', ['pageSlug' => 'news-post'])

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header mb-5">
          <h3 class="card-title">Criação de Notícia</h3>
        </div>
        @if (Session::has('message'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-ban"></i> Atenção!</h5>
                {{ Session::get('message') }}
            </div>
        @endif
        <div class="card-body">
            <form id="form-news" method="post" action="/news/update/{{$newPost->id}}">
              @csrf
              @method('PUT')
              <div class="mb-3">
                  <label for="title" class="form-label">Título da Notícia</label>
                  <input type="text" class="form-control" id="title" name="title" value={{$newPost->title}}>
              </div>
              <div class="mb-3">
                  <label for="title" class="form-label">Resumo</label>
                  <input type="text" class="form-control" id="summary" name="summary" value={{$newPost->summary}}>
              </div>
              <div class="mb-3">
                  <label for="textoNoticia" class="form-label">Texto da Notícia</label>
                  <div id="news">
                  
                  </div>
              </div>
              <input type="hidden" name="new_post" id="new_post" value="{{$newPost->new_post}}">
              <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('scripts') 
    var quill = new Quill('#news', {
      theme: 'snow'
    });

    quill.root.innerHTML = $('#new_post').val();
    $('#form-news').submit(function() {
      var conteudo = quill.root.innerHTML;
      $('#new_post').val(conteudo);
    });
@endsection
