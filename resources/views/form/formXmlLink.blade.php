@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"> Importar imoveis </h3>
      </div>
      <form class="" action="{{ url('importar') }}" method="post">
        {{ csrf_field() }}
        <div class="panel-body">
          <div class="form-group">
            <label for="link"> Adicione o link </label>
            <input type="text" class="form-control" id="link" name="link" placeholder="">
            <p class="help-block">Para importar a lista de imóveis, copie o link do arquivo "XML" e cole no campo acima.</p>
          </div>
        </div>
        <div class="panel-footer">
          <button type="submit" name="button" class="btn btn-success">
            Importar
          </button>
        </div>
      </form>

    </div>
  </div>
@endsection
