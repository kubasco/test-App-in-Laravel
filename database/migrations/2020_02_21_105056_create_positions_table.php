<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('companies_id')->unsigned();

            $table->enum('reference', ['facebook', 'google', 'linked', 'instagram'])->nullable()->default(null);
            $table->string('title', 128);
            $table->text('description');
            $table->string('email', 128);

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('companies_id')->references('id')->on('companies')->delete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('positions');
    }
}
