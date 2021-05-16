<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->integer('seller_id')->default(0);
            $table->integer('category_id')->default(0);
            $table->integer('brand_id')->default(0);

            $table->string('slug')->nullable();
            $table->string('sku')->nullable();
            $table->string('barcode')->nullable();
            $table->string('name')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('youtube_video')->nullable();
            
            $table->double('mrp_price', 8, 2)->default(0.00);
            $table->double('purchase_price', 8, 2)->default(0.00);
            $table->double('selling_price', 8, 2)->default(0.00);
            $table->double('discount_price', 8, 2)->default(0.00);

            $table->tinyInteger('allow_cod')->default(0);
            $table->tinyInteger('featured')->default(0);
            $table->tinyInteger('active_status')->default(0);
            $table->tinyInteger('admin_approve_status')->default(0);

            $table->text('description')->nullable();
            $table->text('terms_policy')->nullable();
            
            $table->softDeletes();
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
