<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePoste extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postes', function (Blueprint $table) {

            
            $table->increments('id');
            $table->enum('category',['Politique', 'Social' ,'Culture','Sport','Informatique','Économie','Médecine','Judiciaire','Indistrielle','Nature','Événement']);
            $table->string('titre')->nullable();;
            $table->string('sujet')->nullable();;
            $table->mediumText('description')->nullable();;
            $table->string('image')->default('null');
            $table->string('video')->default('null');
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
        Schema::dropIfExists('postes');
    }
}
