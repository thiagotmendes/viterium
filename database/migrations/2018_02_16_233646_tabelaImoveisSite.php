<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TabelaImoveisSite extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imoveis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo')->nullable();
            $table->string('codigo')->nullable();
            $table->string('tipo_imovel')->nullable(); // poderia ser uma tabela (objeto) com os valores já armazenados
            $table->string('logradouro')->nullable();
            $table->string('cep')->nullable();
            $table->string('cidade')->nullable();
            $table->string('estado')->nullable();
            $table->string('bairro')->nullable();
            $table->integer('numero')->nullable();
            $table->string('complemento')->nullable();
            $table->float('preco',8,2)->nullable(); // poderia ser string e no momento de realizar alguma operação usaria um floatval para converter em float
            $table->string('finalidade')->nullable(); // se venda, locação ou temporada
            $table->float('tamanho',8,2)->nullable();
            $table->integer('dormitorio')->nullable();  // quantidade no imovél
            $table->integer('suite')->nullable();       // quantidade no imovél
            $table->integer('banheiro')->nullable();    // quantidade no imovél
            $table->integer('sala')->nullable();        // quantidade no imovél
            $table->integer('garagem')->nullable();     // quantidade no imovél
            $table->longText('descricao')->nullable();
            $table->string('imagemCapa')->nullable();   // armazena a string com o caminho da imagem
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imoveis');
    }
}
