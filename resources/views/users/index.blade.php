@extends('layouts.app', ['pageSlug' => 'users'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title"><strong>Usuários</strong></h4>
                    </div>
                    <div class="col-4 text-right">
                        <a href="/user/create" class="btn btn-sm btn-success">Criar Usuário</a>
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
                <div class="">
                    <table class="table tablesorter" id="">
                        <thead class=" text-primary">
                            <tr><th scope="col">Nome</th>
                            <th scope="col">Email</th>
                            <th scope="col">Data de Criação</th>
                            <th scope="col">Ação</th>
                        </tr></thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{date('d/m/Y H:i', strtotime($user->created_at))}}</td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <a href="/user/{{$user->id}}/edit" class="btn btn-info" title="Alterar" data-toggle="tooltip">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a href="/user/delete/{{$user->id}}" class="btn btn-danger" title="Excluír" data-toggle="tooltip">
                                                <i class="tim-icons icon-trash-simple"></i>
                                            </a>
                                        </div>
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
