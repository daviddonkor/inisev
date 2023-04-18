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
        Schema::create('website_subscribers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('website_id',false,true);
            $table->integer('subscriber_id',false,true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('website_subscribers');
    }
};
