<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinancialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'financials', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('investment_id')->nullable();
                $table->foreign('investment_id')->references('id')->on('investments')->onDelete('cascade');
                $table->unsignedInteger('open_offer')->nullable()->default(0);
                $table->unsignedInteger('funded')->nullable()->default(0);
                $table->tinyInteger('irr')->unsigned()->nullable()->default(0);
                $table->tinyInteger('apr')->unsigned()->nullable()->default(0);
                $table->tinyInteger('ehp')->unsigned()->nullable()->default(0);
                $table->unsignedInteger('senior_debt')->nullable()->default(0);
                $table->unsignedInteger('mezzanine_debt')->nullable()->default(0);
                $table->unsignedInteger('equity')->nullable()->default(0);
                $table->unsignedInteger('adquisition_cost')->nullable()->default(0);
                $table->unsignedInteger('development_cost')->nullable()->default(0);
                $table->string('bank')->nullable();
                $table->string('crowdfunding')->nullable();
                $table->timestamps();
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
        Schema::dropIfExists('financials');
    }
}
