<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->nullable(false);//categories table
            $table->integer('brand_id')->nullable(false);//brands table
            $table->integer('size_id')->nullable(false);//sizes table
            $table->string('name')->unique()->nullable(false);
            $table->string('color_way')->nullable(false);
            $table->char('gender_pref', 1)->nullable(false);
            $table->decimal('price')->nullable(false);
            $table->string('pic')->unique()->nullable(false);
            $table->text('description');
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
        Schema::dropIfExists('items');
    }
}
