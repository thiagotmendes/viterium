<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\imoveis;
use App\insertImoveis;

class imoveisController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $listaImoveis = Imoveis::all()->toArray();

      //dd($post);
      return view('grid.gridImoveis', ['imoveis' => $listaImoveis]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('form.formImovel');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // upload da imagem de capa
      if (!empty($request->file( "imageCapa" ))) {
        $filename   =  time() . '.jpg';
        $filepath   = public_path('uploads/images/');
        $file       = $request->file( "imageCapa" );
        $file->move($filepath, $filename);
        $dbPath = url("uploads/images/".$filename); // caminho que vai ser registrado no banco de dados
      } else {
        $dbPath = "";
      }
      // inicia o registro no banco de dados
      $insertImoveis = new insertImoveis;
      $insertImoveis->titulo        = $request->input('titulo');
      $insertImoveis->codigo        = $request->input('codigo');
      $insertImoveis->tipo_imovel   = $request->input('tipo_imovel');
      $insertImoveis->cep           = $request->input('cep');
      $insertImoveis->logradouro    = $request->input('logradouro');
      $insertImoveis->bairro        = $request->input('bairro');
      $insertImoveis->numero        = $request->input('num');
      $insertImoveis->cidade        = $request->input('cidade');
      $insertImoveis->estado        = $request->input('estado');
      $insertImoveis->complemento   = $request->input('complemento');
      $insertImoveis->finalidade    = $request->input('finalidade');
      $insertImoveis->preco         = $request->input('valor');
      $insertImoveis->tamanho       = $request->input('tamanho');
      $insertImoveis->dormitorio    = $request->input('dormitorio');
      $insertImoveis->suite         = $request->input('suites');
      $insertImoveis->banheiro      = $request->input('banheiro');
      $insertImoveis->sala          = $request->input('sala');
      $insertImoveis->garagem       = $request->input('garagem');
      $insertImoveis->descricao     = $request->input('descricao');
      $insertImoveis->imagemCapa    = $dbPath;
  		$insertImoveis->save();
      // fim do registro no banco de dados

      return redirect('imoveis')->with('status', 'Imóvel cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $imovellist = insertImoveis::find($id);
      return view('form.formImovel', ['metodo' => 'PUT', 'dadosImovel' => $imovellist]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      // upload da imagem de capa
      if (!empty($request->file( "imageCapa" ))) {
        $filename   =  time() . '.jpg';
        $filepath   = public_path('uploads/images/');
        $file       = $request->file( "imageCapa" );
        $file->move($filepath, $filename);
        $dbPath = url("uploads/images/".$filename); // caminho que vai ser registrado no banco de dados
      }

      // inicia o registro no banco de dados
      $insertImoveis = insertImoveis::find($id);
      $insertImoveis->titulo        = $request->input('titulo');
      $insertImoveis->codigo        = $request->input('codigo');
      $insertImoveis->tipo_imovel   = $request->input('tipo_imovel');
      $insertImoveis->cep           = $request->input('cep');
      $insertImoveis->logradouro    = $request->input('logradouro');
      $insertImoveis->bairro        = $request->input('bairro');
      $insertImoveis->numero        = $request->input('num');
      $insertImoveis->cidade        = $request->input('cidade');
      $insertImoveis->estado        = $request->input('estado');
      $insertImoveis->complemento   = $request->input('complemento');
      $insertImoveis->finalidade    = $request->input('finalidade');
      $insertImoveis->preco         = $request->input('valor');
      $insertImoveis->tamanho       = $request->input('tamanho');
      $insertImoveis->dormitorio    = $request->input('dormitorio');
      $insertImoveis->suite         = $request->input('suites');
      $insertImoveis->banheiro      = $request->input('banheiro');
      $insertImoveis->sala          = $request->input('sala');
      $insertImoveis->garagem       = $request->input('garagem');
      $insertImoveis->descricao     = $request->input('descricao');
      if (!empty($request->file( "imageCapa" ))) {
        $insertImoveis->imagemCapa    = $dbPath;
      }
      $insertImoveis->save();
      // fim do registro no banco de dados

      return redirect('imoveis/'.$id.'/edit')->with('status', 'Imóvel atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $deleteImovel = insertImoveis::find($id);
      $deleteImovel->delete();
      return redirect('imoveis')->with('statusDel', 'Imóvel excluido com sucesso!');
    }
}
