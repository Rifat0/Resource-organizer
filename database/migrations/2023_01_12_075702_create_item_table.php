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
            $table->id('item_id')->from(10001)->index();
            $table->unsignedBigInteger('category');
            $table->foreign('category')->references('category_id')->on('categories')->cascadeOnUpdate()->cascadeOnDelete();
            $table->unsignedBigInteger('sub_category');
            $table->foreign('sub_category')->references('sub_category_id')->on('sub_categories')->cascadeOnUpdate()->cascadeOnDelete();
            $table->unsignedBigInteger('author');
            $table->foreign('author')->references('user_id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('title',150)->notnullable();
            $table->json('photos',150)->notnullable();
            $table->string('purchase_by',20)->nullable();
            $table->string('purchase_from',100)->nullable();
            $table->date('purchase_date')->nullable();
            $table->text('description')->nullable();
            $table->float('price', 8, 2)->nullable();
            $table->integer('unit')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
            $table->softDeletes();
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
