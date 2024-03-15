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
        Schema::create('bins', function (Blueprint $table) {
            $table->id();
            $table->string('modelo', '40');
            $table->string('placas', 15);
            $table->string('cajon', 20);
            $table->time('hora_entrada');
            $table->date('fecha_entrada');
            $table->time('hora_salida')->nullable();
            $table->date('fecha_salida')->nullable();
            $table->decimal('pagar', 5, 2)->nullable();
            $table->decimal('pago', 5, 2)->nullable();
            $table->integer('estado')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bins');
    }
};
