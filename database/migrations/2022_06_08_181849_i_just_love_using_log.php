<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class IJustLoveUsingLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mycvlog', function (Blueprint $table) {
            $table->longText('message');
    $table->longText('context');
    $table->string('level')->index();
    $table->string('level_name');
    $table->string('channel')->index();
    $table->string('record_datetime');
    $table->longText('extra');
    $table->longText('formatted');
    // Additional custom fields I added 
    $table->string('remote_addr')->nullable();
    $table->string('user_agent')->nullable();
    $table->dateTime('created_at')->nullable();
    // As you can see, I comment this out, because I don't need
    // updated_at
    // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mycvlog');
    }
}
