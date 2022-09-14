@extends('adminlte::page')

@section('title', 'Águas do Rio')

@section('content_header')
    <h1>Ocorrências</h1>
@stop

@section('content')
<h1>Total de Registros: {{ $countRegisters }}</h1>
<h1>Total de Telefone Fixos: {{ $telefoneFixo }}</h1>
<h1>Total de Telefones Moveis: {{ $telefoneMovel }}</h1>
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
        <th scope="col">DsCliente</th>
        <th scope="col">DevCre</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($ocorrences as $ocorrence )
        <tr>
            <th scope="row">{{ $ocorrence->Cd_Credor }}</th>
            <td>{{ $ocorrence->Cd_Devedor }}</td>
            <td>{{ $ocorrence->Cd_Historico }}</td>
            <th>{{ $ocorrence->Cd_Negociador }}</th>
            <td>{{ $ocorrence->MM_Texto }}</td>
            <td>{{ $ocorrence->Dt_Ocorrencia }}</td>
            <td>{{ $ocorrence->Cd_Contrato }}</td>
            <td>{{ $ocorrence->Ds_UsoCliente }}</td>
            <td>{{ $ocorrence->Cd_DevCre }}</td>
          </tr>

        @endforeach


    </tbody>
  </table>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
