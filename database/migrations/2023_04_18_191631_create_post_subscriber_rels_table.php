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
        Schema::create('post_subscriber_rels', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('post_id')->length(10)->unsigned();;
            $table->integer('subscriber_id')->length(10)->unsigned();
            $table->boolean('emailed')->default(false);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_subscriber_rels');
    }
};
