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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('folio');
            $table->string('header_logo_url')->nullable();
            $table->string('place');
            $table->string('receiver_name');
            $table->string('receiver_position');
            $table->string('greeting');
            $table->text('body');
            $table->string('farewell');
            $table->string('issuer_name');
            $table->string('issuer_position');
            $table->string('footer_text')->nullable();
            $table->string('footer_logo_url')->nullable();
            $table->date('signature_limit_date')->nullable();
            $table->string('status')->default('Pendiente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
