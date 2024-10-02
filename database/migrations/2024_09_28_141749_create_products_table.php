<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Execute as migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Campo 'id' do tipo inteiro e auto-incremento
            $table->string('name'); // Campo 'name' do tipo string
            $table->float('price'); // Campo 'price' do tipo float
            $table->text('description'); // Campo 'description' do tipo texto
            $table->string('category'); // Campo 'category' do tipo string
            $table->string('image_url')->nullable(); // Campo 'image_url' do tipo string, que pode ser nulo
            $table->timestamps(); // Campos 'created_at' e 'updated_at'
        });
    }

    /**
     * Reverter as migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products'); // Remove a tabela 'products' se existir
    }
}
