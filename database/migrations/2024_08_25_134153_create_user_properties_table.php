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
        Schema::create('user_properties', static function (Blueprint $table) {
            $table->bigInteger('user_id');
            $table->string('key', 255);
            $table->string('value', 1023);

            $table->unique(['user_id', 'key']);

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_properties');
    }
};
