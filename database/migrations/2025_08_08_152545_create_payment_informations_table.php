<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payment_informations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('full_legal_name');
            $table->string('govt_id');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->string('country');
            $table->string('bank_name');
            $table->string('account_number');
            $table->string('routing_number');
            $table->string('swift_code');
            $table->text('bank_address');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payment_informations');
    }
};
