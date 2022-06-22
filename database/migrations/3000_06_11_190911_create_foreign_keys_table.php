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

        Schema::table('wishes', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users', 'id');
            $table->foreignId('auction_id')->constrained('auctions', 'id');
        });

        Schema::table('reviews', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users', 'id');
            $table->foreignId('auction_id')->constrained('auctions', 'id');
        });

        Schema::table('images', function (Blueprint $table) {
            $table->foreignId('auction_id')->constrained('auctions', 'id');
        });

        Schema::table('auctions', function (Blueprint $table) {
            $table->foreignId('category_id')->constrained('categories', 'id');
            $table->foreignId('tag_id')->constrained('tags', 'id');
        });

        Schema::table('bids', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users', 'id');
            $table->foreignId('auction_id')->constrained('auctions', 'id');
        });

        Schema::table('addresses', function (Blueprint $table) {
            $table->foreignId('city_id')->constrained('cities', 'id');
            $table->foreignId('user_id')->constrained('users', 'id');
        });

        Schema::table(
            'states',
            function (Blueprint $table) {
                $table->foreignId('country_id')->constrained('countries', 'id');
            }
        );

        Schema::table(
            'cities',
            function (Blueprint $table) {
                $table->foreignId('state_id')->constrained('states', 'id');
            }
        );
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
