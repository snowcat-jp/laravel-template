<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('status');
            $table->dateTime('create_datetime')->nullable()->comment('登録日時');
            $table->integer('create_user')->nullable()->comment('登録者');
            $table->dateTime('update_datetime')->nullable()->comment('更新日時');
            $table->integer('update_user')->nullable()->comment('更新者');
            $table->dateTime('delete_datetime')->nullable()->comment('削除日時');
            $table->integer('delete_user')->nullable()->comment('削除者');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contents');
    }
}
