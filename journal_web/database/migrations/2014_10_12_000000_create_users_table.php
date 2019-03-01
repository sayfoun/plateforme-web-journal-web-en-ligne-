<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('cin')->nullable();
            $table->string('last_name')->nullable();
            $table->string('sex')->nullable();
            $table->string('role_id')->default('user')->comment('cette attribut pour verifer esque cette user admin ou non');
            $table->boolean('journaliste')->default(false)->comment('attribut pour verifer eesque cette user un journaliste ou non');
            $table->string('avatar')->default('user.png');
            $table->string('official_Document')->default('document.png');
            $table->string('adresse')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
