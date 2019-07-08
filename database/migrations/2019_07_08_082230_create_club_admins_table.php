<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClubAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('club_admins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('club_id')->unsigned();
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->timestamps();
            $table->foreign('club_id')->references('id')->on('clubs')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('club_admins');
    }
}
