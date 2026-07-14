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
        Schema::create('prestamos', function (Blueprint $table) {

        $table->id();

        $table->foreignId('cliente_id')
              ->constrained('clientes')
              ->onDelete('cascade');

        $table->decimal('monto', 12, 2);

        $table->decimal('interes', 5, 2);

        $table->decimal('saldo_capital', 12, 2);

        $table->date('fecha_prestamo');

        $table->boolean('estado')->default(true);

        $table->text('observaciones')->nullable();

        $table->timestamps();
        
         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestamos');
    }
};
