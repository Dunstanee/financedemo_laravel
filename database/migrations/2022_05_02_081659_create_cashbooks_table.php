<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cashbooks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tenant_id');
            $table->string('title');
            $table->decimal('cash_in',15,2)->default('0.00');
            $table->decimal('cash_out',15,2)->default('0.00');
            $table->decimal('bank_in',15,2)->default('0.00');
            $table->decimal('bank_out',15,2)->default('0.00');
            $table->decimal('mpesa_in',15,2)->default('0.00');
            $table->decimal('mpesa_out',15,2)->default('0.00');
            $table->decimal('internal_in',15,2)->default('0.00');
            $table->decimal('internal_out',15,2)->default('0.00');
            $table->unsignedBigInteger('Staff_id');
            $table->integer('status')->default(0);
            $table->date('transaction_date');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cashbooks');
    }
};
