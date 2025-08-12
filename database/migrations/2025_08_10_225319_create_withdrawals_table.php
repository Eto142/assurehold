<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('withdrawals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('payment_method'); // bank or crypto
             $table->string('withdrawal_status'); // status
             $table->string('withdrawal_tax_code'); // code
            $table->decimal('amount', 15, 2);
            $table->text('details'); // store bank/crypto info as JSON
            $table->tinyInteger('status')->default(0); // 0 = pending, 1 = approved
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('withdrawals');
    }
};
