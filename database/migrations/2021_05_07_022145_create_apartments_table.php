<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->integer('id');
            $table->string('ext_id');
            $table->string('name');
            $table->string('description');
            $table->integer('quantity');
            $table->integer('active')->default('0');              
            $table->timestamps();       
            $table->softDeletes();

            $table->primary('ext_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apartments');
    }
}
