<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\insertImoveis;
use DB;

class importaImoveis extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index(){
    return view('form.formXmlLink');
  }

  public function insertXmlData(Request $request){
    ini_set('max_execution_time', 180);

    $link = $request->input('link'); //link do arquivo xml
    $xml = simplexml_load_file($link)->Imoveis;

    $insertImoveis = new insertImoveis;
    $importData = array();
    foreach ($xml->Imovel as $imovel) {
      // verifica a finalidade do imovel
      if (!empty($imovel->PrecoVenda)) {
        $finalidade    = "Venda";
        $preco         = $imovel->PrecoVenda;
      }
      if(!empty($imovel->PrecoLocacao)){
        $finalidade    = "Locação";
        $preco         = $imovel->PrecoLocacao;
      }
      if(!empty($imovel->PrecoLocacaoTemporada)){
        $finalidade    = "Temporada";
        $preco        = $imovel->PrecoLocacaoTemporada;
      }

      $importData[] = [
        'codigo'        => $imovel->CodigoImovel,
        'tipo_imovel'   => $imovel->TipoImovel,
        'cep'           => $imovel->CEP,
        'logradouro'    => $imovel->CodigoImovel,
        'bairro'        => $imovel->Bairro,
        'numero'        => $imovel->Numero,
        'cidade'        => $imovel->Cidade,
        'estado'        => $imovel->UF,
        'complemento'   => $imovel->Complemento,
        'finalidade'    => $finalidade,
        'preco'         => $preco,
        'tamanho'       => $imovel->AreaTotal,
        'dormitorio'    => $imovel->QtdDormitorios,
        'suite'         => $imovel->QtdSuites,
        'banheiro'      => $imovel->QtdBanheiros,
        'sala'          => $imovel->QtdSalas,
        'garagem'       => $imovel->QtdVagas,
        'descricao'     => $imovel->Observacao
      ];
    } // /foreach

    DB::table('imoveis')->insert($importData);

    return redirect('imoveis')->with('status', 'Lista de imóveis importada com sucesso!');
  }

}
