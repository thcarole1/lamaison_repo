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
            $table->bigIncrements('id');
            $table->string('Title',100)->nullable();
            $table->text('Description',100)->nullable();
            $table->decimal('Price',5,2)->nullable();;
            $table->enum('Size',['46','48','50','52'])->nullable();;
            $table->string('url_image',100)->nullable();;
            $table->enum('Status',['publié','brouillon'])->nullable();;
            $table->enum('Code',['solde', 'new'])->nullable();;
            $table->string('Reference',100)->nullable();
            $table->dateTime('published_at')->nullable(); // DATETIME nullable non obligatoire
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
