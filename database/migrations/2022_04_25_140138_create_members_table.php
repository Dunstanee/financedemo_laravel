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
        Schema::create('members', function (Blueprint $table) {
            $table->id()->from(22222);
            $table->string('first_name'); 
            $table->string('second_name'); 
            $table->string('last_name'); 
            $table->string('gender'); 
            $table->string('village');
            $table->unsignedBigInteger('tenantid'); 
            $table->unsignedBigInteger('branchid');
            $table->unsignedBigInteger('groupid'); 
            $table->date('dob'); 
            $table->integer('mobile'); 
            $table->string('occupation'); 
            $table->string('email')->nullable(); 
            $table->string('national_id'); 
            $table->date('registration_date');
            $table->string('profile_image')->nullable();
            $table->integer('huduma_number')->nullable()->default(0); 
            $table->string('kra_pin')->nullable(); 
            $table->string('beneficiary_name')->nullable(); 
            $table->integer('beneficiary_bational_id')->nullable()->default(0); 
            $table->string('benefiaciary_relation')->nullable(); 
            $table->integer('beneficiary_phone')->nullable()->default(0); 
            $table->string('next_of_kin_name')->nullable(); 
            $table->integer('next_of_kin_id')->nullable()->default(0);
            $table->string('next_of_kin_relation')->nullable();
            $table->integer('kin_contact')->nullable()->default(0); 
            $table->string('disability');
            $table->integer('status')->nullable()->default(2);
            $table->integer('active')->nullable()->default(2);
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
        Schema::dropIfExists('members');
    }
};
