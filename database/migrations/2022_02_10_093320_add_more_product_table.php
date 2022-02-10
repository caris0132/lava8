<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->integer('brand_id')->unsigned();
            $table->integer('product_category_id')->unsigned();
            $table->text('description')->nullable();
            $table->text('content')->nullable();
            $table->double('price')->default(0);
            $table->integer('qty')->default(0);
            $table->double('discount')->nullable();
            $table->double('weight')->nullable();
            $table->string('sku')->nullable();
            $table->boolean('featured');
            $table->string('tag')->nullable();

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
            $table->dropColumn('brand_id');
            $table->dropColumn('product_category_id');
            $table->dropColumn('content');
            $table->dropColumn('price');
            $table->dropColumn('qty');
            $table->dropColumn('discount');
            $table->dropColumn('weight');
            $table->dropColumn('sku');
            $table->dropColumn('featured');
            $table->dropColumn('tag');
        });
    }
}
