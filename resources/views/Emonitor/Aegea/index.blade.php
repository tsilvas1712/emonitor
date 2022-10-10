@extends('adminlte::page')

@section('title', 'Águas do Rio')

@section('content_header')
    <h1>Ocorrências</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Aguas do Rio</h1>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Credor</th>
                        <th scope="col">Devedor</th>
                        <th scope="col">Histórico</th>
                        <th scope="col">Negociador</th>
                        <th scope="col">Texto</th>
                        <th scope="col">Data Ocorrência</th>
                        <th scope="col">Contrato</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ocorrences as $ocorrence)
                        <tr>
                            <th scope="row">{{ $ocorrence->Cd_Credor }}</th>
                            <td>{{ $ocorrence->Cd_Devedor }}</td>
                            <td>{{ $ocorrence->Cd_Historico }}</td>
                            <th>{{ $ocorrence->Cd_Negociador }}</th>
                            <td>{{ $ocorrence->MM_Texto }}</td>
                            <td>{{ $ocorrence->Dt_Ocorrencia }}</td>
                            <td>{{ $ocorrence->Cd_Contrato }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        <div class="card-footer">

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
