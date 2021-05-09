<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartment_categories', function (Blueprint $table) {
            
            $table->string('ext_id');
            $table->string('title');
            $table->string('description');
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
        Schema::dropIfExists('apartment_categories');
    }
}
