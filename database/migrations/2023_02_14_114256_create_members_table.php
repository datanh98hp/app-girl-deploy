<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('user_name')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('otp')->nullable();
            $table->date('birthday')->nullable();
            $table->string('avatar')->nullable();
            $table->string('cover_image')->nullable();
            $table->string('description')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->integer('money')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
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
}
