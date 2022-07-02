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
        Schema::table('user_quests', function (Blueprint $table) {
            $table->text('steps_finished')->nullable()->change();
            $table->boolean('quest_finished')->default(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_quests', function (Blueprint $table) {
            $table->text('steps_finished')->change();
            $table->boolean('quest_finished')->change();
        });
    }
};
