<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvestmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'investments', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('user_id')->nullable();
                //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->unsignedInteger('company_id')->nullable();
                //$table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
                $table->unsignedInteger('promoter_id')->nullable();
                //$table->foreign('promoter_id')->references('id')->on('promoters')->onDelete('cascade');
                $table->string('slug')->nullable();
                $table->string('name');
                $table->unsignedInteger('total_area')->nullable()->default(0);
                $table->text('amenities')->nullable();
                $table->text('context')->nullable();
                $table->text('description')->nullable();
                $table->text('resume')->nullable();
                $table->string('website')->nullable();
                $table->boolean('featured')->nullable()->default(0);
                $table->boolean('published')->nullable()->default(0);
                $table->datetime('published_at')->nullable();
                $table->timestamps();
                $table->SoftDeletes();
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
        Schema::dropIfExists('investments');
    }
}
