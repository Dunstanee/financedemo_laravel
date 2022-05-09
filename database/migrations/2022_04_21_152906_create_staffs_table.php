<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
        Schema::create('staffs', function (Blueprint $table) {
            $table->id()->from(211112);
            $table->unsignedBigInteger('tenantid');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->integer('id_number');
            $table->text('city');
            $table->string('village');
            $table->integer('huduma_number')->default(0)->nullable();
            $table->string('personal_file_no')->default('Nill')->nullable();
            $table->date('date_of_birth');
            $table->string('gender');
            $table->integer('phone');
            $table->text('email');
            $table->string('nhif_number')->nullable();
            $table->string('nssf_number')->nullable();
            $table->string('kra_pin')->nullable();
            $table->string('college_certificates')->nullable();
            $table->text('school_certificate_grades')->nullable();
            $table->text('staff_photo')->nullable();
            $table->string('password');
            $table->integer('staff_status')->default(2);
            $table->string('staff_active')->default('Active');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
        DB::table('staffs')->insert([
            [
                'tenantid'=>1,
                'first_name'=>'Admin',
                'last_name'=>'admin',
                'id_number'=>'1234',
                'city'=>'kenya',
                'village'=>'kenya',
                'Date_of_Birth'=>date('Y-m-d'),
                'gender'=>1,
                'phone'=>'745676543',
                'email'=>'admin@gmail.com',
                'password'=>Hash::make('1234'),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staffs');
    }
};
