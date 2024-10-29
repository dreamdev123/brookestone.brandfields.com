<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->char('gender', 1)->default('M');
            $table->string('street_name', 50);
            $table->string('house_number', 50);
            $table->string('postal_code', 50);
            $table->string('city', 50);
            $table->integer('country_id')->default(211);
            $table->string('passport_id', 50);
            $table->date('passport_issuance_date')->default(Carbon::now());
            $table->date('passport_expirition_date')->default(Carbon::now());
            $table->date('birthday')->default(Carbon::now());
            $table->integer('country_of_birth')->default(211);
            $table->integer('country_of_passport_issuance')->default(211);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
