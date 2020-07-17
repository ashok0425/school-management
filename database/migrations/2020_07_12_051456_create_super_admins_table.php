<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class CreateSuperAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('super_admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->text('image')->nullable();
            $table->integer('role_id');
            $table->boolean('block')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('super_admins')->insert([
            [
                'name'=>'Admin',
                'email'=>'superadmin@admin.com',
                'role_id'=>1,
                'password'=>Hash::make('superpassword'),
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
        Schema::dropIfExists('super_admins');
    }
}
