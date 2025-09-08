<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo', ['comentario', 'sugestao']);
            $table->string('nome')->nullable();
            $table->string('email')->nullable();
            $table->text('conteudo');
            $table->foreignId('tourist_attraction_id')->nullable()->constrained('tourist_attractions')->nullOnDelete();
            $table->string('atracao_sugerida')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};



