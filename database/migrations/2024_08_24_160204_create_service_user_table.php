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
        Schema::create('service_user', static function (Blueprint $table) {
            $table->id();

            $table->uuid('service_id');
            $table->foreign('service_id')
                ->references('id')
                ->on('services')
                ->onDelete('cascade');

            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');

            $table->boolean('active')
                ->default(true);

            $table->timestamps();

            $table->index('service_id');
            $table->index('user_id');

            $table->unique(['service_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_user');
    }
};
