<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * name
     * photo
     * bio
     * dob
     * country
     */
    public function up(): void
    {
        Schema::create('userprofile', function (Blueprint $table) {
            $table->id('profile_id');
            $table->string("name");
            $table->text("photo")->nullable()->default(NULL);
            $table->longText("bio");
            $table->date("dob");
            $table->string('country');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userprofile');
    }
};
