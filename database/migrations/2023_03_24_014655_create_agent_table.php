<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('agent', function (Blueprint $table) {
            $table->id();
            $table->foreign('usersID')->references('id')->on('users');
            $table->string('agentName')->unique();
            $table->enum('agentCat', ['','Delivery Agent', 'Fulfillment Agent']);
            $table->string('registrationNum');
            $table->string('contact');
            $table->string('address');
            $table->string('city');
            $table->string('postcode');
            $table->string('state');
            $table->string('country');
            $table->string('remarks');
            $table->timestamps();
        })
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agent');
    }
};
