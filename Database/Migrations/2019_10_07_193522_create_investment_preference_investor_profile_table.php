<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvestmentPreferenceInvestorProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investment_preference_investor_profile', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('investment_preference_id');
            $table->foreign('investment_preference_id')->references('id')->on('investment_preferences')->onDelete('cascade');
            $table->unsignedInteger('investor_profile_id');
            $table->foreign('investor_profile_id')->references('id')->on('investor_profiles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('investment_preference_investor_profile');
    }
}
