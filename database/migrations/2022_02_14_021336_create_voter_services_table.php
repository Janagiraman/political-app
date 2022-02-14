<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoterServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voter_services', function (Blueprint $table) {
            $table->id();
            $table->string('epic_no');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('service_type');
            $table->string('is_provide_service')->nullable();
            $table->string('image')->nullable();
            $table->string('voter_name')->nullable();
            $table->string('comment')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
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
        Schema::dropIfExists('voter_services');
    }
}
