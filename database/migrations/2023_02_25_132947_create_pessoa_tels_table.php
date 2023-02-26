<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoaTelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoa_tels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pessoa')->nullable();
            $table->foreign('id_pessoa')->references('id')->on('pessoas')->nullOnDelete();
            $table->string('num_tel', 14);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('pessoa_tels');
        Schema::enableForeignKeyConstraints();
    }
}
