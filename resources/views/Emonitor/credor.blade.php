@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Ocorrencias</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>{{ $credor->id }} - {{ $credor->credor }}</h1>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Data</th>
                        <th>Tipo</th>
                        <th>Quantidade</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ocorrences as $ocorrence)
                        <tr>
                            <td>{{ $ocorrence->created_at->format('d/m/Y - H:i:s') }}</td>
                            <td>{{ $ocorrence->tipo }}</td>
                            <td>{{ $ocorrence->contador }}</td>
                            <td>
                                <a href="#" class="btn btn-primary">Detalhes</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
