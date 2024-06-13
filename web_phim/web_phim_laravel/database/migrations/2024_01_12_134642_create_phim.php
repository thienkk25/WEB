<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('phim', function (Blueprint $table) {
            $table->id('id_phim')->unsigned()->autoIncrement();
            $table->string('ten_phim');
            $table->string('link_anh_phim');
            $table->string('conents', 2000);
            $table->string('status_practice', 3);
            $table->string('max_parctice', 3);
            $table->string('category', 10);
            $table->string('status_movie', 20);
            $table->string('year_release', 4);
            $table->bigInteger('view_movie');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phim');
    }
};
