<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoterInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voter_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('voter_id');
            $table->string('epic_no');
            $table->string('doc_type');
            $table->string('value');
            $table->string('image')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('comment');
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
        Schema::dropIfExists('voter_infos');
    }
}
