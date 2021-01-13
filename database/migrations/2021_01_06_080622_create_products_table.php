<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('description')->nullable();
            $table->longText('content')->nullable();
            $table->enum('type', ['auction', 'regular'])->default('regular');
            $table->enum('timeframe', ['stock', 'date', 'always'])->default('always');
            $table->integer('price');
            $table->integer('price_discount')->nullable();
            $table->integer('price_min')->nullable();
            $table->timestamp('starts')->nullable();
            $table->timestamp('ends')->nullable();
            $table->longText('images')->nullable();
            $table->boolean('active');
            $table->boolean('new');
            $table->integer('stock')->nullable();
            $table->integer('parent_id')->unsigned()->nullable();
            $table->integer('lft')->unsigned()->nullable();
            $table->integer('rgt')->unsigned()->nullable();
            $table->integer('depth')->unsigned()->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('products');
    }
}
