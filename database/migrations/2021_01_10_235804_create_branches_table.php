<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('document');
            $table->string('name');
            $table->string('alias');
            $table->string('phone');
            $table->string('celphone')->nullable();
            $table->string('email');
            $table->string('site')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('address');
            $table->string('number');
            $table->string('district');
            $table->string('complement')->nullable();
            $table->string('city');
            $table->string('state', 2);
            $table->boolean('active')->default(true);
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
        Schema::dropIfExists('branches');
    }
}
