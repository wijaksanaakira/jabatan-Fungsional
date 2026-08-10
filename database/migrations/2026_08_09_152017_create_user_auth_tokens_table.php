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
        Schema::create('user_auth_tokens', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->string('token_hash')->unique();
            $table->string('type')->default('qr_login');
            $table->string('status')->default('active');
            $table->timestamp('expires_at')->nullable();
            $table->timestamp('last_used_at')->nullable();
            $table->unsignedInteger('created_by')->nullable();
            $table->timestamp('revoked_at')->nullable();
            $table->unsignedInteger('revoked_by')->nullable();
            $table->timestamps();

            $table->foreign('user_id', 'uat_user_fk')
                  ->references('id')
                  ->on('user')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_auth_tokens');
    }
};