@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header mb-5">
          <h3 class="card-title">Criação de Usuário</h3>
        </div>
        @if (Session::has('message'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-ban"></i> Atenção!</h5>
                {{ Session::get('message') }}
            </div>
        @endif
        <div class="card-body">
            <form id="form-user" method="post" action="/user">
              @csrf
                <div class="form-row">             
                    <div class="form-group col-md-6">
                        <strong>Nome Completo</strong>
                        <input type="text" autocomplete="off" name="name" class="form-control">
                    </div>
                    <div class="form-group col-md-3">
                        <strong>E-mail</strong>
                        <input type="email" autocomplete="off" name="email" class="form-control">
                    </div>
                    <div class="form-group col-md-3">
                      <strong>Senha (min 6 caracteres)</strong>
                      <input type="password" autocomplete="off" name="password" class="form-control" required>
                  </div>
                  
                  <div class="form-group col-md-3">
                      <strong>Confirmar Senha</strong>
                      <input type="password" autocomplete="off" name="password_confirmation" class="form-control" required>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('scripts') 

@endsection
