<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cad_contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('contact_razao',false, true)->length(60);
            $table->string('contact_fanta',false, true)->length(60);
            $table->string('contact_contato',false, true)->length(30);
            $table->string('contact_cargo',false, true)->length(20);
            $table->char('contact_tel',false, true)->length(13);
            $table->integer('contact_ramal',false, true)->length(4);
            $table->char('contact_cel',false, true)->length(14);
            $table->string('contact_email',false, true)->length(100);
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('cad_contacts');
    }
}
