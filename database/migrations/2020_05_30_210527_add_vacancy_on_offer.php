<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVacancyOnOffer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('offers', function (Blueprint $table) {
            $table->integer('vacancies_id', false, true)->nullable();
            $table->foreign('vacancies_id')->references('id')->on('vacancies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('offers', 'vacancies_id')) {
            Schema::table('offers', function (Blueprint $table) {
                $table->dropForeign(['vacancies_id']);
                $table->dropColumn(['vacancies_id']);
            });
        }
    }
}
