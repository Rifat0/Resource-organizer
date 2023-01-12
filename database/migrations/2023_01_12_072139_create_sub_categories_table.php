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
        Schema::create('sub_categories', function (Blueprint $table) {

            $table->id('sub_category_id')->index();
            $table->unsignedBigInteger('category')->notnullable();
            $table->foreign('category')->references('category_id')->on('categories')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('sub_category_name',50)->notnullable();
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_categories');
    }
};
