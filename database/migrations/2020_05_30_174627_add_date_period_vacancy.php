<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDatePeriodVacancy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vacancies', function (Blueprint $table) {
            $table->dateTime('date_start')->nullable();
            $table->dateTime('date_end')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('vacancies', 'date_start')) {
            Schema::table('vacancies', function (Blueprint $table) {
                $table->dropColumn(['date_start','date_end']);
            });
        }
    }
}
