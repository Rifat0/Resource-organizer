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
        Schema::create('item', function (Blueprint $table) {
            $table->id('item_id')->index();
            $table->unsignedBigInteger('category');
            $table->foreign('category')->references('category_id')->on('categories')->cascadeOnUpdate()->cascadeOnDelete();
            $table->unsignedBigInteger('sub_category');
            $table->foreign('sub_category')->references('sub_category_id')->on('sub_categories')->cascadeOnUpdate()->cascadeOnDelete();
            $table->unsignedBigInteger('author'); 
            $table->foreign('author')->references('user_id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('title',150)->notnullable();
            $table->date('purchase_date')->nullable();
            $table->text('description')->nullable();
            $table->float('price', 8, 2)->nullable();
            $table->integer('unit')->nullable();
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
        Schema::dropIfExists('item');
    }
};
