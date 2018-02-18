@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"> Cadastro Imóvel </h3>
      </div> {{-- /panel-heading --}}
      @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
      @endif
      @php
        if (isset($dadosImovel)) {
          $url = "imoveis/".$dadosImovel['id'];
        } else {
          $url = "imoveis";
        }
      @endphp
      <form class="" action="{{ url($url) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        @if (isset($metodo))
          {{ method_field('PATCH') }}
        @endif
        <div class="panel-body">
          <div class="row">
            <div class="col-md-9">
              <div class="row">
                <div class="col-md-7">
                  <div class="form-group">
                    <label for="titulo">Titulo Anuncio</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder=""
                    value="@if(isset($dadosImovel)){{ $dadosImovel['titulo'] }}@endif">
                  </div>
                </div> {{-- /col-md --}}
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="codigo">Código Imovél</label>
                    <input type="text" class="form-control" id="codigo" name="codigo" placeholder=""
                    value="@if(isset($dadosImovel)){{ $dadosImovel['codigo'] }}@endif">
                  </div>
                </div> {{-- /col-md --}}
                <div class="col-md-2">
                  <div class="form-group">
                    @php
                      $tipoImovel = array('Casa','Apartamento');
                    @endphp
                    <label for="tipo_imovel"> Tipo Imóvel </label>
                    <select class="form-control" name="tipo_imovel" id="tipo_imovel">
                      <option></option>
                      @foreach ($tipoImovel as $tipo)
                        @if (isset($dadosImovel) && $dadosImovel['tipo_imovel'] == $tipo)
                          <option selected>{{ $tipo }}</option>
                        @else
                          <option>{{ $tipo }}</option>
                        @endif
                      @endforeach
                    </select>
                  </div>
                </div> {{-- /col-md --}}
              </div> {{-- /row --}}
              <div class="row">
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="cep">CEP</label>
                    <input type="text" class="form-control" id="cep" name="cep" placeholder=""
                    value="@if(isset($dadosImovel)){{ $dadosImovel['cep'] }}@endif">
                  </div>
                </div> {{-- /col-md --}}
                <div class="col-md-5">
                  <div class="form-group">
                    <label for="logradouro"> Rua </label>
                    <input type="text" class="form-control" id="rua" name="logradouro" placeholder=""
                    value="@if(isset($dadosImovel)){{ $dadosImovel['logradouro'] }}@endif">
                  </div>
                </div> {{-- /col-md --}}
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="bairro"> Bairro </label>
                    <input type="text" class="form-control" id="bairro" name="bairro" placeholder=""
                    value="@if(isset($dadosImovel)){{ $dadosImovel['bairro'] }}@endif">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="num"> N° </label>
                    <input type="number" class="form-control" id="num" name="num" placeholder=""
                    value="@if(isset($dadosImovel)){{ $dadosImovel['numero'] }}@endif">
                  </div>
                </div> {{-- /col-md --}}
                <div class="col-md-7">
                  <div class="form-group">
                    <label for="cidade"> Cidade </label>
                    <input type="text" class="form-control" id="cidade" name="cidade" placeholder=""
                    value="@if(isset($dadosImovel)){{ $dadosImovel['cidade'] }}@endif">
                  </div>
                </div> {{-- /col-md --}}
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="estado"> Estado </label>
                    <input type="text" class="form-control" id="uf" name="estado" placeholder=""
                    value="@if(isset($dadosImovel)){{ $dadosImovel['estado'] }}@endif">
                  </div>
                </div> {{-- /col-md --}}
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="complemento"> Complemento </label>
                    <input type="text" class="form-control" id="complemento" name="complemento" placeholder=""
                    value="@if(isset($dadosImovel)){{ $dadosImovel['complemento'] }}@endif">
                  </div>
                </div> {{-- /col-md --}}
              </div> {{-- /row --}}
              <fieldset>
                <legend> Informações sobre imóvel </legend>
                <div class="row">
                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="finalidade"> Finalidade </label>
                      @php
                        $finalidade = array('Venda','Locação','Temporada');
                      @endphp
                      <select class="form-control" name="finalidade">
                        <option></option>
                        @foreach ($finalidade as $finalidadeImovel)
                          @if (isset($dadosImovel) && $dadosImovel['finalidade'] == $finalidadeImovel)
                            <option selected>{{ $finalidadeImovel }}</option>
                          @else
                            <option>{{ $finalidadeImovel }}</option>
                          @endif
                        @endforeach
                      </select>
                    </div>
                  </div> {{-- /col-md --}}
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="valor"> Valor </label>
                      <input type="text" class="form-control" id="valor" name="valor" placeholder=""
                      value="@if(isset($dadosImovel)){{ $dadosImovel['preco'] }}@endif">
                    </div>
                  </div> {{-- /col-md --}}
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="tamanho"> Tamanho (m²) </label>
                      <input type="text" class="form-control" id="tamanho" name="tamanho" placeholder=""
                      value="@if(isset($dadosImovel)){{ $dadosImovel['tamanho'] }}@endif">
                    </div>
                  </div> {{-- /col-md --}}
                </div> {{-- /row --}}
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="dormitorio">Dormitórios</label>
                      <input type="number" class="form-control" id="dormitorio" name="dormitorio" placeholder=""
                      value="@if(isset($dadosImovel)){{ $dadosImovel['dormitorio'] }}@endif">
                    </div>
                  </div>{{-- /col-md --}}
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="suites">Suites</label>
                      <input type="number" class="form-control" id="suites" name="suites" placeholder=""
                      value="@if(isset($dadosImovel)){{ $dadosImovel['suite'] }}@endif">
                    </div>
                  </div>{{-- /col-md --}}
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="banheiro">Banheiros</label>
                      <input type="number" class="form-control" id="banheiro" name="banheiro" placeholder=""
                      value="@if(isset($dadosImovel)){{ $dadosImovel['banheiro'] }}@endif">
                    </div>
                  </div>{{-- /col-md --}}
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="sala">Sala</label>
                      <input type="number" class="form-control" id="sala" name="sala" placeholder=""
                      value="@if(isset($dadosImovel)){{ $dadosImovel['sala'] }}@endif">
                    </div>
                  </div>{{-- /col-md --}}
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="garagem"> Garagem </label>
                      <input type="number" class="form-control" id="garagem" name="garagem" placeholder=""
                      value="@if(isset($dadosImovel)){{ $dadosImovel['garagem'] }}@endif">
                    </div>
                  </div> {{-- /col-md --}}
                </div> {{-- /row --}}
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="descricao"> Descrição </label>
                      <textarea name="descricao" id="descricao" name="descricao" class="form-control" rows="8">@if(isset($dadosImovel)){{ $dadosImovel['descricao'] }}@endif
                      </textarea>
                    </div>
                  </div>  {{-- /col-md --}}
                </div> {{-- /row --}}
              </fieldset> {{-- /fieldset --}}
            </div> {{-- /col-md --}}
            <div class="col-md-3">
              <div class="form-group">
                <label for="image"> Imagem de capa </label>
                <input type="file" class="form-control" id="imageCapa" name="imageCapa" placeholder="">
                @if(isset($dadosImovel))
                  <img src="{{ $dadosImovel['imagemCapa'] }}" alt="" class="img-responsive">
                @endif
              </div>
            </div> {{-- /col-md --}}
          </div> {{-- /row --}}
        </div> {{-- /panel-body --}}
        <div class="panel-footer">
          <button type="submit" name="button" class="btn btn-success">
            Cadastrar
          </button>
        </div> {{-- /panel-footer --}}
      </form> {{-- /form --}}
    </div> {{-- /panel --}}
  </div> {{-- /container --}}
@endsection
