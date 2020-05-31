<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TagsRelationChangeName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('tags_relation', 'tags_id')) {
            Schema::table('tags_relation', function (Blueprint $table) {
                $table->renameColumn('tags_id', 'tag_id');

            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('tags_relation', 'tag_id')) {
            Schema::table('tags_relation', function (Blueprint $table) {
                $table->renameColumn('tag_id', 'tags_id');

            });
        }
    }
}
