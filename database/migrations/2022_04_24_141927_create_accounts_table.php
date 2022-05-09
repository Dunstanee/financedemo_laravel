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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('account_name');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
        DB::table('accounts')->insert([
            ['account_name'=>'SHARE ACCOUNT'],
            ['account_name'=>'SAVING ACCOUNT'],
            ['account_name'=>'BUILDING SHARE ACCOUNT'],
            ['account_name'=>'COMPULSARY ACCOUNT'],
            ['account_name'=>'VOLUNTARY ACCOUNT'],
            ['account_name'=>'GROUP ACCOUNT'],
            ['account_name'=>'DIVIDED ACCOUNT'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
};
