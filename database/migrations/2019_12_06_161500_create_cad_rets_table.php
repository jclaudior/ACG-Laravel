<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCadRetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cad_rets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('contact_id')->unsigned();
            $table->foreign('contact_id')->references('id')->on('cad_contacts');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->date('ret_dt')->nullable(false);
            $table->boolean('ret_fin')->default('0');
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
        Schema::dropIfExists('cad_rets');
    }
}
