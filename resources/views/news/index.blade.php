@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card ">
      <div class="card-header">
        <div class="row">
            <div class="col-6">
                <h4 class="card-title">Notícias</h4>
            </div>
            <div class="col-6 text-right">
                <a href="{{ route('news.create') }}">
                  <button  type="button" class="btn btn-success btn-sm">Criar Notícia</button> 
                </a>
            </div>
        </div>
      </div>
      @if (Session::has('message'))
        <div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ Session::get('message') }}
        </div>
      @endif
      <div class="card-body">
        <div class="table-responsive">
          <table class="table tablesorter " id="">
            <thead class=" text-primary">
              <tr>
                <th>
                  Título
                </th>
                <th>
                  Criado em 
                </th>
                <th>
                  Atualizado em
                </th>
                <th >
                  Ação
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach($newPosts as $newPost)
                <tr>
                  <td>{{$newPost->title}}</td>
                  <td>{{$newPost->created_at}}</td>
                  <td>{{$newPost->updated_at}}</td>
                  <td>
                    <div class="btn-group btn-group-sm">
                      <a href="/news/{{$newPost->id}}/edit" class="btn btn-info" title="Alterar" data-toggle="tooltip">
                          <i class="fas fa-pencil-alt"></i>
                      </a>
                      <a href="/news/{{$newPost->id}}/visualizar" class="btn btn-success" title="Visualizar" data-toggle="tooltip">
                              <i class="tim-icons  icon-laptop"></i>
                      </a>
                      <a href="/news/{{$newPost->id}}/delete" class="btn btn-danger" title="Excluír" data-toggle="tooltip">
                        <i class="tim-icons icon-trash-simple"></i>
                      </a>
                  </div>'
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
@section('scripts') 
  $('table').DataTable({
    "retrieve": true,
  });
@endsection
