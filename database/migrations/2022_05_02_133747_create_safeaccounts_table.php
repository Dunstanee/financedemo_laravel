<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('safeaccounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tenant_id');
            $table->decimal('deposit_amount',15,2)->default('0.00');
            $table->decimal('withdraw_amount',15,2)->default('0.00');
            $table->unsignedBigInteger('staffid')->default(1);
            $table->date('entry_date');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
        DB::table('safeaccounts')->insert([
            ['tenant_id'=>1,'deposit_amount'=>50000,'withdraw_amount'=>0,'entry_date'=>date('Y-m-d')],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('safeaccounts');
    }
};
