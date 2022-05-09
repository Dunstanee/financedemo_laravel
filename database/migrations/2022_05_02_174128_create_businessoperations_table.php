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
        Schema::create('businessoperations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tenant_id');
            $table->unsignedBigInteger('opened_by');
            $table->decimal('open_balance',15,2)->default('0.00');
            $table->time('open_time');
            $table->date('open_date');
            $table->time('close_time')->nullable();
            $table->decimal('close_balance',15,2)->default('0.00');
            $table->date('close_date')->nullable();
            $table->unsignedBigInteger('closed_by')->default(0);
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('businessoperations');
    }
};
