<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('category'); // Cambiamos category_id por category
            $table->decimal('price', 8, 2);
            $table->integer('quantity');
            $table->string('sku')->unique();
            $table->string('image')->nullable();
            $table->timestamps();
            $table->softDeletes(); // Para SoftDeletes
        });
    }

    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
