<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tourist_attractions', function (Blueprint $table) {
            $table->id();
            $table->string('cidade', 100);
            $table->string('pais', 100);
            $table->string('categoria');
            $table->string('imagem_url')->nullable();
            $table->text('endereco')->nullable();
            
            // Nomes em diferentes idiomas
            $table->string('nome_pt');
            $table->string('nome_en');
            $table->string('nome_es');
            
            // Descrições em diferentes idiomas
            $table->text('descricao_pt')->nullable();
            $table->text('descricao_en')->nullable();
            $table->text('descricao_es')->nullable();
            
            $table->timestamps();
            
            // Adicionar restrições únicas apenas para nomes
            $table->unique('nome_pt');
            $table->unique('nome_en');
            $table->unique('nome_es');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tourist_attractions');
    }
};
