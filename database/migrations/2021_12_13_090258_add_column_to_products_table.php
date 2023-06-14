<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->integer("used")->nullable();
            $table->integer("kilometer")->nullable();
            $table->string("year")->nullable();
            $table->string("fuel")->nullable();
            $table->string("engine")->nullable();
            $table->string("color")->nullable();
            $table->string("address")->nullable();
            $table->string("type_of_sim")->nullable();
            $table->tinyInteger("type")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {

            $table->dropColumn("used");
            $table->dropColumn("kilometer");
            $table->dropColumn("views");
            $table->dropColumn("year");
            $table->dropColumn("fuel");
            $table->dropColumn("engine");
            $table->dropColumn("color");
            $table->dropColumn("address");
            $table->dropColumn("type_of_sim");
            $table->dropColumn("type");
        });
    }
}
