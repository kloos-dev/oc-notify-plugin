<?php namespace Kloos\Notify\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class UpdatePostsTable extends Migration
{
    public function up()
    {
        Schema::table('kloos_notify_posts', function (Blueprint $table) {
            $table->tinyInteger('send_pushnotification')->default(0);
        });
    }

    public function down()
    {
        Schema::table('kloos_notify_posts', function (Blueprint $table) {
            $table->dropColumn('send_pushnotification');
        });
    }
}
