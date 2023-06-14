<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable()->comment("Tên người gửi thông báo");
            $table->string('email')->nullable();
            $table->integer('phone');
            $table->text('address')->nullable();
            $table->text('content')->nullable();
            $table->tinyInteger('status')->default(0)->comment("1=> Đã xử lý | 0 => Chưa xử lý");
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
        Schema::dropIfExists('contacts');
    }
}
