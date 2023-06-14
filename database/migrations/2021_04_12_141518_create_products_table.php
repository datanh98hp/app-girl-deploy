<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('brand_id')->nullable();
            $table->string('code');
            $table->string('name');
            $table->string('image')->nullable();
            $table->longText('images')->nullable();
            $table->bigInteger('price')->default(0);
            $table->bigInteger('price_old')->default(0);
            $table->bigInteger('views')->default(0)->comment('Lượt xem');
            $table->tinyInteger('installment')->default(0)->comment('Trả góp: 1=>  Có | 0=>Không');
            $table->string('description')->nullable();
            $table->string('style')->nullable()->comment("kiểu dáng");
            $table->longText('content')->nullable();
            $table->text("link_video")->nullable();
            $table->tinyInteger('status')->default(1)->comment("0 => pending | 1 => publish");
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
        Schema::dropIfExists('products');
    }
}
