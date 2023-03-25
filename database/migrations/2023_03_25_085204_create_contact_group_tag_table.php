<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('contact_group_tag', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('contact_id');
        $table->unsignedBigInteger('group_id')->nullable();
        $table->unsignedBigInteger('tag_id')->nullable();
        $table->timestamps();

        $table->foreign('contact_id')->references('id')->on('contacts')->onDelete('cascade');
        $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
        $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_group_tag');
    }
};
