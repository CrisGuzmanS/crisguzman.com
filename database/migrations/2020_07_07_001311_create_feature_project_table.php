<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeatureProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feature_project', function (Blueprint $table) {
            $table->bigIncrements('id'); // Puedes usar bigIncrements para la clave primaria de esta tabla pivote.
            $table->unsignedBigInteger('feature_id');
            $table->unsignedBigInteger('project_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feature_project');
    }
}
