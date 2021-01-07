<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePopupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('popups', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle');
            $table->string('slug')->unique();
            $table->string('description')->nullable();
            $table->enum('type', ['auction', 'regular'])->default('regular');
            $table->integer('price');
            $table->integer('price_discount')->nullable();
            $table->integer('price_min')->nullable();
            $table->timestamp('starts')->nullable();
            $table->timestamp('ends')->nullable();
            $table->longText('images')->nullable();
            $table->boolean('active');
            $table->integer('stock')->nullable();
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
        Schema::dropIfExists('popups');
    }
}
