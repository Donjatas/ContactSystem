<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommunicationsTable extends Migration
{
    public function up()
{
    Schema::create('communications', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('contact_id');
        $table->foreign('contact_id')->references('id')->on('contacts')->onDelete('cascade');
        $table->string('type');
        $table->string('subject');
        $table->text('message');
        $table->dateTime('scheduled_at')->nullable();
        $table->timestamps();
    });
}


    public function down()
    {
        Schema::dropIfExists('communications');
    }
};
