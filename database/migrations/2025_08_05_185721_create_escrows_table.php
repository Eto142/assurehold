<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('escrows', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->date('dob')->nullable();
            $table->string('phone')->nullable();
            $table->string('street')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->string('country')->nullable();
            $table->string('purpose')->nullable();
            $table->text('other_purpose')->nullable();
            $table->text('transaction_details');
            $table->boolean('agreed')->default(false);
           $table->tinyInteger('status')->default(0); // 0 = pending, 1 = approved
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('escrows');
    }
};

