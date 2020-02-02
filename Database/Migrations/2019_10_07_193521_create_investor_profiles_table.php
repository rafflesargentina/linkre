<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvestorProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investor_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('investment_type_id')->nullable();
            $table->foreign('investment_type_id')->references('id')->on('investment_types')->onDelete('cascade');
            $table->unsignedInteger('investment_value_id')->nullable();
            $table->foreign('investment_value_id')->references('id')->on('investment_values')->onDelete('cascade');
            $table->unsignedInteger('investor_type_id')->nullable();
            $table->foreign('investor_type_id')->references('id')->on('investor_types')->onDelete('cascade');
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('real_estate')->nullable()->default(0);
            $table->boolean('expertise')->nullable()->default(0);
            $table->boolean('portfolio')->nullable()->default(0);
            $table->boolean('consulting')->nullable()->default(0);
            $table->boolean('reit')->nullable()->default(0);
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
        Schema::dropIfExists('investor_profiles');
    }
}
