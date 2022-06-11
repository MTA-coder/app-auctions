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

        Schema::table('favorites', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users', 'id');
            $table->foreignId('product_id')->constrained('products', 'id');
        });

        Schema::table('reviews', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users', 'id');
            $table->foreignId('product_id')->constrained('products', 'id');
        });

        Schema::table('images', function (Blueprint $table) {
            $table->foreignId('product_id')->constrained('products', 'id');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->foreignId('category_id')->constrained('categories', 'id');
            $table->foreignId('tag_id')->constrained('tags', 'id');
        });

        Schema::table('bids', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users', 'id');
            $table->foreignId('product_id')->constrained('products', 'id');
        });

        Schema::table('payments', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users', 'id');
            $table->foreignId('bid_id')->constrained('bids', 'id');
        });

        Schema::table('addresses', function (Blueprint $table) {
            $table->foreignId('city_id')->constrained('cities', 'id');
            $table->foreignId('country_id')->constrained('countries', 'id');
            $table->foreignId('state_id')->constrained('states', 'id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
};
