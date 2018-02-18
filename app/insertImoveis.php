<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class insertImoveis extends Model
{
  protected $primaryKey = 'id';
  protected $table = 'imoveis';
  protected $fillable = array(
      'titulo',
      'codigo',
      'tipo_imovel',
      'logradouro',
      'cep',
      'cidade',
      'estado',
      'bairro',
      'numero',
      'complemento',
      'preco',
      'finalidade',
      'tamanho',
      'dormitorio',
      'suite',
      'banheiro',
      'sala',
      'garagem',
      'descricao',
      'imagemCapa'
  );

  public $timestamps = true;
}
