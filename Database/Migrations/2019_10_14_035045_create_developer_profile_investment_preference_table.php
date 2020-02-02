<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeveloperProfileInvestmentPreferenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('developer_profile_investment_preference', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('developer_profile_id');
            $table->foreign('developer_profile_id')->references('id')->on('developer_profiles')->onDelete('cascade');
            $table->unsignedInteger('investment_preference_id');
            $table->foreign('investment_preference_id')->references('id')->on('investment_preferences')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('developer_profile_investment_preference');
    }
}
