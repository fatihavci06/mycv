<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('task_name')->nullable();
            $table->string('company_name')->nullable();
            $table->string('date')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('active')->default(0)->comment('Şuan burdamı çalışıyor');;

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('experiences');
    }
}
