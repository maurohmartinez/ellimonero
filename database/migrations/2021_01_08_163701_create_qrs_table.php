<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qrs', function (Blueprint $table) {
            $table->id();
            $table->string('welcome')->nullable();
            $table->longText('success')->nullable();
            $table->text('image')->nullable();
            $table->string('token')->unique();
            $table->text('description')->nullable();
            $table->timestamp('starts')->nullable();
            $table->timestamp('ends')->nullable();
            $table->boolean('always_visible');
            $table->boolean('active');
            $table->integer('stock')->nullable();
            $table->enum('type', ['ticket'])->default('ticket');
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
        Schema::dropIfExists('qrs');
    }
}
