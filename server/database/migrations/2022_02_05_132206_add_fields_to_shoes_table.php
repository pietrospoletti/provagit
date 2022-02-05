<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToShoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shoes', function (Blueprint $table) {
            $table->string('nome')->nullable(); 
            $table->string('brand')->nullable();        
            $table->integer('numero')->nullable();
            $table->integer('prezzo')->nullable();
            $table->date('uscita')->nullable();
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
        Schema::table('shoes', function (Blueprint $table) {
            $table->dropColumn ([
                'nome',
                'brand',
                'numero',
                'prezzo',
                'uscita',
                ]);
        });
    }
}
