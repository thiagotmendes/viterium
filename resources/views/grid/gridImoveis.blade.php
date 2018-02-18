@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title pull-left"> Imóveis registrados </h3>
        <a href="{{ url('imoveis/create') }}" class="pull-right"> Adicionar imoveis </a>
        <div class="clearfix">  </div>
      </div>
      <div class="panel-body">
        @if (session('status'))
          <div class="alert alert-success">
              {{ session('status') }}
          </div>
        @endif
        @if (session('statusDel'))
          <div class="alert alert-danger">
              {{ session('statusDel') }}
          </div>
        @endif
        <table class="table table-striped table-bordered crud-table">
          <thead class="thead-inverse">
            <tr>
              <th> Titulo </th>
              <th> Código </th>
              <th> Cidade </th>
              <th> Estado </th>
              <th> Tipo Imóvel </th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($imoveis as $lista )
              <tr>
                <td> {{ $lista['titulo'] }} </td>
                <td> {{ $lista['codigo'] }} </td>
                <td> {{ $lista['cidade'] }} </td>
                <td> {{ $lista['estado'] }} </td>
                <td> {{ $lista['tipo_imovel'] }} </td>
                <td width="5%">
                  <a href="{{ url('imoveis/'.$lista['id']."/edit") }}" class="btn btn-info"> <i class="fas fa-edit"></i> </a> </td>
                <td width="5%">
                  <form class="" action="{{ url('imoveis/'.$lista['id']) }}" method="post">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $lista['id'] }}">
                    <button type="submit" name="button" class="btn btn-danger"> <i class="fas fa-trash-alt"></i> </button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

@endsection
