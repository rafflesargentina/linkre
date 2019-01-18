<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvestmentInvestorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'investment_investor', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('investor_id');
                $table->foreign('investor_id')->references('id')->on('investors')->onDelete('cascade');
                $table->unsignedInteger('investment_id');
                $table->foreign('investment_id')->references('id')->on('investments')->onDelete('cascade');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('investment_investor');
    }
}
