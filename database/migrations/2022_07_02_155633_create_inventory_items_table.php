<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_items', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('type');
            $table->integer('damage')->nullable();
            $table->string('ammo_type')->nullable();
            $table->string('range')->nullable();
            $table->string('accuracy')->nullable();
            $table->integer('weight')->default(0);
            $table->integer('value')->default(0);
            $table->string('image_name')->nullable();
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
        Schema::dropIfExists('inventory_items');
    }
};
