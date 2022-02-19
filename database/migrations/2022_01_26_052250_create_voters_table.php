<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voters', function (Blueprint $table) {
            $table->id();
            $table->integer('booth_no');
            $table->string('booth_name');
            $table->string('area_name')->nullable();
            $table->string('ward_name')->nullable();
            $table->integer('sl_no')->nullable();
            $table->string('epic_no');
            $table->string('voter_name')->nullable();
            $table->string('relation_name')->nullable();
            $table->string('gender')->nullable();
            $table->string('age')->nullable();
            $table->string('family_member')->nullable();
            $table->string('relationship')->nullable();
            $table->string('aadhar_no')->nullable();
            $table->string('mobile')->nullable();
            $table->string('photo')->nullable();
            $table->string('address')->nullable();
            $table->string('caste')->nullable();
            $table->string('dob')->nullable();
            $table->string('profession')->nullable();
            $table->string('ration_card_no')->nullable();
            $table->string('ayushman_card_no')->nullable();
            $table->string('estrain_card')->nullable();
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
        Schema::dropIfExists('voters');
    }
}
