@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <h1 class="card-title">Notíciais Recentes</h1>
                        </div>
                    </div>
                </div>
            </div>
            @foreach ($newPosts as $newPost)
                <div class="card">
                    <div class="row p-3">
                        <div class="col-md-12">
                            <a href="/news/{{$newPost->id}}/visualizar">
                                <h3>{{$newPost->title}}</h3>
                            </a>
                            <div>
                                <h4><strong>Resumo</strong><h4>
                                <div>
                                    <p>{{$newPost->title}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    
@endsection

@push('js')
    <script src="{{ asset('white') }}/js/plugins/chartjs.min.js"></script>
    <script>
        $(document).ready(function() {
          demo.initDashboardPageCharts();
        });
    </script>
@endpush
