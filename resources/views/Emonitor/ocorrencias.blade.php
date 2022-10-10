@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Ocorrencias</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Credores</h1>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Código</th>
                        <th>Credor</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($credores as $credor)
                        <tr>
                            <td>{{ $credor->id }}</td>
                            <td>{{ $credor->credor }}</td>
                            <td>
                                <a href="{{ route('ocorrences.credor', $credor->id) }}" class="btn btn-primary">Atividades</a>
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
