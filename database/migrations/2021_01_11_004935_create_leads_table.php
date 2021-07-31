<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('source_id')->nullable()->references('id')->on('sources')->onDelete('set null');
            $table->foreignId('branch_id')->nullable()->references('id')->on('branches')->onDelete('set null');
            $table->foreignId('status_id')->nullable()->references('id')->on('statuses')->onDelete('set null');
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
            $table->text('comments')->nullable();
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
        Schema::dropIfExists('leads');
    }
}
