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
        Schema::create('accountentries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tenantid');
            $table->unsignedBigInteger('memberid');
            $table->unsignedBigInteger('accountid');
            $table->decimal('deposit_amount',15,2)->nullable()->default('0.00');
            $table->decimal('withdraw_amount',15,2)->nullable()->default('0.00');
            $table->unsignedBigInteger('staffid');
            $table->date('transactiondate');
            $table->unsignedBigInteger('trans_mode');
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
        Schema::dropIfExists('accountentries');
    }
};
